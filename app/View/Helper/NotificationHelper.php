<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class NotificationHelper extends AppHelper {
	protected $status_descriptor = array(
		'1' => 'In Proccess',
		'2' => 'Sending',
		'3' => 'Completed',
		'4' => 'Error',
		'5' => 'Stop',
		'6' => 'Not completed'
	);
	
	protected $status_descriptor_edit = array(
		'1' => 'In Proccess',
		'5' => 'Stop'
	);	

	protected $status_descriptor_class = array(
		'1' => 'label label-default',
		'2' => 'label label-primary',
		'3' => 'label label-success',
		'4' => 'label label-danger',
		'5' => 'label label-warning',
		'6' => 'label label-warning'
	);

	public function getStatusDescriptors() {
		return $this->status_descriptor;
	}
	
	public function getStatusEditDescriptors() {
		return $this->status_descriptor_edit;
	}	
	
	public function getStatusDescriptor($value) {
		return $this->status_descriptor[$value];
	}
	
	public function getStatusDescriptorClass($value) {
		return $this->status_descriptor_class[$value];
	}
	
	public function getMinutesOptions() {
		$minutes = array();
		for($i=1;$i<=60;$i++) {
			$minutes[$i] = $i;
		}
		return $minutes;
	}	
}
