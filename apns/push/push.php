<?php

// This script should be run as a background process on the server. It checks
// every few seconds for new messages in the database table push_queue and 
// sends them to the Apple Push Notification Service.
//
// Usage: php push.php development &
//    or: php push.php production &
//
// The & will detach the script from the shell and run it in the background.
//
// The "development" or "production" parameter determines which APNS server
// the script will connect to. You can configure this in "push_config.php".
// Note: In development mode, the app should be compiled with the development
// provisioning profile and it should have a development-mode device token.
//
// If a fatal error occurs (cannot establish a connection to the database or
// APNS), this script exits. You should probably have some type of watchdog
// that restarts the script or at least notifies you when it quits. If this
// script isn't running, no push notifications will be delivered!

if (!defined('KM_INPROCESS')) {
	define('KM_INPROCESS', '1');
}
if (!defined('KM_SENDING')) {
	define('KM_SENDING', '2');
}
if (!defined('KM_SUCCESS')) {
	define('KM_SUCCESS', '3');
}
if (!defined('KM_ERROR')) {
	define('KM_ERROR', '4');
}

if (!defined('DEVICE_ENABLED')) {
	define('DEVICE_ENABLED', '1');
}

try
{
	require_once('push_config.php');

	ini_set('display_errors', 'off');
	
	if ($argc != 2 || ($argv[1] != 'development' && $argv[1] != 'production'))
	{
		$mode = 'development';
		//exit("Usage: php push.php development|production". PHP_EOL);
	}
	
	$config = $config[$mode];
	writeToLog("Push script started ($mode mode)");
	if (!extension_loaded('openssl')) {
		writeToLog("Open SSL is not enabled");
	} else {
		writeToLog("Open SSL is enabled");
	}

	
	$obj = new APNS_Push($config);
	$obj->start();
}
catch (Exception $e)
{
	fatalError($e);
}

////////////////////////////////////////////////////////////////////////////////

function writeToLog($message)
{
	global $config;
	if ($fp = fopen($config['logfile'], 'at'))
	{
		fwrite($fp, date('c') . ' ' . $message . "\n");
		fclose($fp);
	}
}

function fatalError($message)
{
	writeToLog('Exiting with fatal error: ' . $message);
	exit;
}

////////////////////////////////////////////////////////////////////////////////

class APNS_Push
{
	private $fp = NULL;
	private $server;
	private $server_url;
	private $port;
	private $certificate;
	private $passphrase;

	function __construct($config)
	{
		$this->server_url = $config['server'];
		$this->port = $config['port'];
		$this->server = $config['server'] . ':' . $config['port'];
		
		$this->certificate = $config['certificate'];
		$this->passphrase = $config['passphrase'];

		// Create a connection to the database.
		$this->pdo = new PDO(
			'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], 
			$config['db']['username'], 
			$config['db']['password'],
			array());

		// If there is an error executing database queries, we want PDO to
		// throw an exception.
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// We want the database to handle all strings as UTF-8.
		$this->pdo->query('SET NAMES utf8');
	}

	// This is the main loop for this script. It polls the database for new
	// messages, sends them to APNS, sleeps for a few seconds, and repeats this
	// forever (or until a fatal error occurs and the script exits).
	function start()
	{	
		if($this->checkRequiredPorts()) {
			writeToLog("Port 2195 is avalaible");
		} else {
			writeToLog("Port 2195 is not avalaible!!!");
			exit("Port 2195 is not avalaible!!!". PHP_EOL);
		}

		writeToLog('Connecting to ' . $this->server);
		if (!$this->connectToAPNS()) exit;
		$shutdown_time = time() + (82800);
		while(1) {
			// Do at most 20 messages at a time. Note: we send each message in
			// a separate packet to APNS. It would be more efficient if we 
			// combined several messages into one packet, but this script isn't
			// smart enough to do that. ;-)
			if( time() > $shutdown_time ) {
				writeToLog("shutting down the notification service");
			}
			
			$stmt = $this->pdo->prepare('SELECT * FROM notifications WHERE (status = 1) AND (push_time <= NOW())');
			$stmt->execute();
			$messages = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach ($messages as $message)
			{	
				// Create the payload body
				$badge = (int)$message->badge;
				// Encode the payload as JSON
				if($badge > 0){
					$body['aps'] = array(
						'alert' => $message->message,
						'sound' => 'default',
						'badge' => $badge,
						);					
				} else {
					$body['aps'] = array(
						'alert' => $message->message,
						'sound' => 'default'
						);						
				}
				$payload = json_encode($body);
				
				$stmt = $this->pdo->prepare('UPDATE notifications SET status = ?, updated = NOW() WHERE id = ?');
				$stmt->execute(array(KM_SENDING, $message->id));
				
				$stmt = $this->pdo->prepare('SELECT * FROM devices WHERE enabled = ?');
				$stmt->execute(array(DEVICE_ENABLED));				
				$devices = $stmt->fetchAll(PDO::FETCH_OBJ);
				
				$count_sent = 0;
				
				foreach ($devices as $device) {
					if ($this->sendNotification($message->id, $device->device_token, $payload))
					{
						usleep(1000*10);
						$count_sent++;
					}
					else  // failed to deliver
					{
						$this->reconnectToAPNS();
					}
				}
				
				$device_count = count($devices);
				writeToLog("Devices: $device_count , Sent: $count_sent");
				
				$stmt = $this->pdo->prepare('UPDATE notifications SET status = ?, updated = NOW() WHERE id = ?');
				if($device_count==$count_sent) {
					$stmt->execute(array(KM_SUCCESS, $message->id));
				} else {
					$stmt->execute(array(KM_ERROR, $message->id));
				}
			}
			unset($messages);
			unset($devices);			
			sleep(10);
			writeToLog("Waking up, fetching new notifications...");
		}
	}

	// Opens an SSL/TLS connection to Apple's Push Notification Service (APNS).
	// Returns TRUE on success, FALSE on failure.
	function connectToAPNS()
	{
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $this->certificate);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $this->passphrase);

		$this->fp = stream_socket_client('ssl://' . $this->server, $err, $errstr,60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

		if (!$this->fp)
		{
			writeToLog("Failed to connect: $err $errstr");
			return FALSE;
		}

		writeToLog('Connection OK');
		return TRUE;
	}

	// Drops the connection to the APNS server.
	function disconnectFromAPNS()
	{
		fclose($this->fp);
		$this->fp = NULL;
	}

	// Attempts to reconnect to Apple's Push Notification Service. Exits with
	// an error if the connection cannot be re-established after 3 attempts.
	function reconnectToAPNS()
	{
		$this->disconnectFromAPNS();
	
		$attempt = 1;
	
		while (true)
		{
			writeToLog('Reconnecting to ' . $this->server . ", attempt $attempt");

			if ($this->connectToAPNS())
				return;

			if ($attempt++ > 3)
				fatalError('Could not reconnect after 3 attempts');

			sleep(60);
		}
	}

	// Sends a notification to the APNS server. Returns FALSE if the connection
	// appears to be broken, TRUE otherwise.
	function sendNotification($messageId, $deviceToken, $payload)
	{
		if (strlen($deviceToken) != 64)
		{
			writeToLog("Message $messageId has invalid device token");
			return TRUE;
		}

		if (strlen($payload) < 10)
		{
			writeToLog("Message $messageId has invalid payload");
			return TRUE;
		}

		writeToLog("Sending message $messageId to '$deviceToken', payload: '$payload'");

		if (!$this->fp)
		{
			writeToLog('No connection to APNS');
			return FALSE;
		}

		// The simple format
		$msg = chr(0)                       // command (1 byte)
		     . pack('n', 32)                // token length (2 bytes)
		     . pack('H*', $deviceToken)     // device token (32 bytes)
		     . pack('n', strlen($payload))  // payload length (2 bytes)
		     . $payload;                    // the JSON payload

		/*
		// The enhanced notification format
		$msg = chr(1)                       // command (1 byte)
		     . pack('N', $messageId)        // identifier (4 bytes)
		     . pack('N', time() + 86400)    // expire after 1 day (4 bytes)
		     . pack('n', 32)                // token length (2 bytes)
		     . pack('H*', $deviceToken)     // device token (32 bytes)
		     . pack('n', strlen($payload))  // payload length (2 bytes)
		     . $payload;                    // the JSON payload
		*/

		$result = @fwrite($this->fp, $msg, strlen($msg));

		if (!$result)
		{
			writeToLog('Message not delivered');
			return FALSE;
		}

		writeToLog('Message successfully delivered');
		return TRUE;
	}
	
	function checkRequiredPorts()
	{
		$fp = fsockopen($this->server_url, $this->port, $errno, $errstr, 5);
		if (!$fp) {
			// port is closed or blocked
			return false;
		} else {
			// port is open and available
			fclose($fp);
			return true;
		}
	}

}
