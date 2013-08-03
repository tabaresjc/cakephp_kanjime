<?php
App::uses('AppModel', 'Model');
/**
 * Newsletter Model
 *
 */
class Newsletter extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'newsletter';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
}
