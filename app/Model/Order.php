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
	
	public function beforeSave($options = array()) {
		if (empty($this->data[$this->alias]['token']) || strlen($this->data[$this->alias]['token'])<=0) {
			$cipherHash = Configure::write('Security.cipherHash');
			$this->data[$this->alias]['token'] = hash_hmac('ripemd160', $this->data[$this->alias]['name'] . $this->data[$this->alias]['created'], $cipherHash);
		}
		return true;
	}	
}
