<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $theme = "Cakestrap";
    public $components = array(
		/*'DebugKit.Toolbar',*/
		'Security' => array(
			'csrfExpires' => '+1 hour'
		),
        'Acl',
		'RequestHandler',
		'Session',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),
			'loginAction' => array('controller' => 'users', 'action' => 'login'),            
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'loginRedirect' => array('controller' => 'admins', 'action' => 'index'),
        ),
		'Rest.Rest' => array(
			'catchredir' => true,
			'debug' => 0,
			'auth' => array(
				'keyword' => 'KMW_AUTH',
				'fields' => array(
					'class' => 'class',
					'apikey' => 'account_sid',
					'username' => 'username',
				),
			),
			'ratelimit' => array(
				'enable' => false,
				'default' => 'Order',
				'classlimits' => array(
					'Collection' => array('-1 hour', 1000),
					'Order' => array('-1 hour', 1000)
				),
				'identfield' => 'apikey',
				'ip_limit' => array('-1 hour', 60),  // For those not logged in
			),
			'actions' => array(
                'index' => array(
                    'extract' => array('data')
                ),
				'add' => array(
                    'extract' => array('data')
                ),
				'update' => array(
                    'extract' => array('data')
                ),
				'delete' => array(
                    'extract' => array('data')
                ),
				'view' => array(
                    'extract' => array('data')
                )
            ),
			'meta' => array(
				'enable' => true,
				'requestKeys' => array(
					'HTTP_HOST',
					'HTTP_USER_AGENT',
					'REMOTE_ADDR',
					'REQUEST_METHOD',
					'REQUEST_TIME',
					'REQUEST_URI',
					'SERVER_ADDR',
					'SERVER_PROTOCOL'
				),
			),			
		)
    );
	
    public $helpers = array(
        'Html' => array(
            'className' => 'GenericHtml'
        ),
		'Form',
		'Session'
    );
	
	protected function isRest() {
		return !empty($this->Rest) && is_object($this->Rest) && $this->Rest->isActive();
	}

	public function beforeFilter() {		
		// Try to login user via REST
		if ($this->isRest()) {
			$this->Auth->autoRedirect = false;
			$this->loadModel('User');
			$this->loadModel('Group');
			$credentials = $this->Rest->credentials(true);
			$user = $this->User->find('first', array(
				'conditions' => array('User.username' => $credentials['username'],
									  'User.account_sid' => $credentials['account_sid'])
			));			
			if (!empty($user) /*&& $this->Auth->login($user)*/) {
				$this->Auth->allow($this->params['action']);
				$this->Security->unlockedActions = $this->params['action'];				
			}else {
				$msg = sprintf('Unable to log you in with the supplied credentials. ');
				return $this->Rest->abort(array('status' => '403', 'error' => $msg));
			}
		}       
	}
}
