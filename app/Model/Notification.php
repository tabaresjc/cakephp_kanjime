<?php
App::uses('AppModel', 'Model');
/**
 * Notification Model
 *
 */
class Notification extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'We require a message in order to Push a new Notification',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'between' => array(
                'rule'    => array('between', 20, 100),
                'message' => 'You can only send messages with 20 to 100 characters long'
            )
		),
		'badge' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter only numeric values',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'between' => array(
                'rule'    => array('between', 0, 100),
                'message' => 'You can only set from 0 to 100 in the badge'
            )			
		),
		'status' => array(
			'valid' => array(
                'rule' => array('inList', array('1','2','3','4','5')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
		),
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['minutes'])) {
			$this->data[$this->alias]['push_time'] = date('Y-m-d H:i:s', strtotime("+{$this->data[$this->alias]['minutes']} minutes"));
			unset($this->data[$this->alias]['minutes']);
		}
		
		return true;
	}
}
