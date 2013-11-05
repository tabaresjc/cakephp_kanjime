<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 */
class Order extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
/*

====================================================
ADAPTATIVE PAYMENT
====================================================	
CREATED = The payment request was received; funds will be transferred once the payment is approved
COMPLETED = The payment was successful
INCOMPLETE = Some transfers succeeded and some failed for a parallel payment or, for a delayed chained payment, secondary receivers have not been paid
ERROR = The payment failed and all attempted transfers failed or all completed transfers were successfully reversed
REVERSALERROR = One or more transfers failed when attempting to reverse a payment
PROCESSING = The payment is in progress
PENDING = The payment is awaiting processing
====================================================
REST APIs PAYMENT
====================================================	
Payment state. Must be one of the following: created; approved; failed; pending; canceled; or expired. Assigned in response.
*/	
	public function beforeSave($options = array()) {
		if (empty($this->data[$this->alias]['token']) || strlen($this->data[$this->alias]['token'])<=0) {
			$cipherHash = Configure::read('Security.cipherHash');
			$this->data[$this->alias]['token'] = hash_hmac('ripemd160', $this->data[$this->alias]['name'] . date("Y-m-d H:i:s"), $cipherHash);
		}

		if(strcmp($this->data[$this->alias]['payment_status'],'CREATED') == 0) {
			$this->data[$this->alias]['payment_status'] = 'created';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'COMPLETED') == 0) {
			$this->data[$this->alias]['payment_status'] = 'approved';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'ERROR') == 0) {
			$this->data[$this->alias]['payment_status'] = 'failed';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'INCOMPLETE') == 0) {
			$this->data[$this->alias]['payment_status'] = 'failed';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'REVERSALERROR') == 0) {
			$this->data[$this->alias]['payment_status'] = 'failed';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'PROCESSING') == 0) {
			$this->data[$this->alias]['payment_status'] = 'pending';
		} else if(strcmp($this->data[$this->alias]['payment_status'],'PENDING') == 0) {
			$this->data[$this->alias]['payment_status'] = 'pending';
		}

		return true;
	}
}
