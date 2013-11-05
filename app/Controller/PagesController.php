<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
	public function beforeFilter() {
		parent::beforeFilter();
		if(!preg_match('/dashboard/',$this->request->here)){
			$this->Auth->allow('display');
		}
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		
		if(preg_match('/dashboard/',$this->request->here)){
			$this->layout = 'default';
			$stats = array();
			

			$this->loadModel('Device');
			$this->loadModel('Notification');
			$this->loadModel('Collection');
			$this->loadModel('Order');
			
			//Collection's stats
			$options = array('conditions' => array('Collection.status' => '1'));
			$stats['count_publish_names'] = $this->Collection->find('count', $options);
			$options = array('conditions' => array('Collection.status' => '2'));
			$stats['count_draft_names'] = $this->Collection->find('count', $options);			
			
			//Device's stats
			$stats['count_devices'] = $this->Device->find('count');
			$options = array('conditions' => array('Device.enabled' => '1'));
			$stats['count_enabled_devices'] = $this->Device->find('count', $options);
						
			//Notification's stats
			$options = array('conditions' => array('Notification.status' => '3'));
			$stats['count_notifications'] = $this->Notification->find('count', $options);
			$options = array('conditions' => array('Notification.status' => '5'));
			$stats['count_notifications_stopped'] = $this->Notification->find('count', $options);
			
			//Order's stats
			$stats['sales_month'] = $this->Order->query("SELECT IFNULL(sum(payment_amount),0) as TOTAL FROM orders WHERE (payment_currency = 'USD') AND (payment_status = 'approved');");
			$stats['sales_month'] = $stats['sales_month'][0][0]['TOTAL'];			
			
			$stats['sales_pending'] = $this->Order->query("SELECT IFNULL(sum(payment_amount),0) as TOTAL FROM orders WHERE (payment_currency = 'USD') AND (payment_status = 'pending');");
			$stats['sales_pending'] = $stats['sales_pending'][0][0]['TOTAL'];

			$this->set(compact('page', 'subpage', 'title_for_layout', 'stats'));

			} else {
			$this->layout = 'home';
			$this->set(compact('page', 'subpage', 'title_for_layout'));
		}
		
		
		$this->render(implode('/', $path));
	}
}
