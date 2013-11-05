<?php

// Configuration file for push.php

$config = array(
	// These are the settings for development mode
	'development' => array(

		// The APNS server that we will use
		'server' => 'gateway.sandbox.push.apple.com',
		'port' => '2195',
		// The SSL certificate that allows us to connect to the APNS servers
		'certificate' => 'ck_development.pem',
		'passphrase' => 'admin123456',

		// Configuration of the MySQL database
		'db' => array(
			'host'     => 'localhost',
			'dbname'   => 'kazue77_kanjime',
			'username' => 'kazue77_kanjime',
			'password' => 'oZdoz8ZkmTJn',
			),

		// Name and path of our log file
		'logfile' => '../log/push_development.log',
		),

	// These are the settings for production mode
	'production' => array(

		// The APNS server that we will use
		'server' => 'gateway.push.apple.com',
		'port' => '2195',
		// The SSL certificate that allows us to connect to the APNS servers
		'certificate' => 'ck_production.pem',
		'passphrase' => 'admin123456',

		// Configuration of the MySQL database
		'db' => array(
			'host'     => 'localhost',
			'dbname'   => 'kazue77_kanjime',
			'username' => 'kazue77_kanjime',
			'password' => 'oZdoz8ZkmTJn',
			),

		// Name and path of our log file
		'logfile' => '../log/push_production.log',
		),
	);
