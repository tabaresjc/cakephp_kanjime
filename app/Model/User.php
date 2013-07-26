<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'You can\'t leave this empty.'
            ),
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'You can use letters and numbers'
            ),
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters'
            )			
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'You can\'t leave this empty.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('minLength', '8'),
                'message' => 'Use at least 8 characters'
            )
        ),
        'password_confirm' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please confirm the password'
            ),
            'valid' => array(
                'rule' => array('matchingPassword'),
                'message' => 'These passwords don\'t match. Try again?'
            )			
        ),
		'blank_password' => array(
            'required' => array(
                'rule' => array('minLength', '8'),
                'message' => 'Use at least 8 characters',
				'allowEmpty' => true
            )
        ),
		'blank_password_confirm' => array(
			'valid' => array(
                'rule' => array('matchingEditPassword'),
                'message' => 'These passwords don\'t match. Try again?',
				'allowEmpty' => true
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'manager', 'operator', 'serveradmin')),
                'message' => 'Please select a valid role',
                'allowEmpty' => false
            )
        ),
		'email' => array(
			'rule'    => 'email',
			'message' => 'Please supply a valid email address.',
			'allowEmpty' => true
		)	
    );
	
    public function matchingPassword($check) {
        return (strcmp($this->data[$this->alias]['password'],$this->data[$this->alias]['password_confirm']) == 0 );
    }

    public function matchingEditPassword($check) {
		if(isset($this->data[$this->alias]['blank_password']) && isset($this->data[$this->alias]['blank_password_confirm'])){
			return (strcmp($this->data[$this->alias]['blank_password'],$this->data[$this->alias]['blank_password_confirm']) == 0 );
		}
		return true;
    }
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['blank_password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['blank_password']);
		}
		
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
