<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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
		'email' => array(
			'rule'    => 'email',
			'message' => 'Please supply a valid email address.',
			'allowEmpty' => true
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	*/
    public $belongsTo = array('Group');

	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	
    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	
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
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		if (isset($this->data[$this->alias]['blank_password']) && strlen($this->data[$this->alias]['blank_password'])>0) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['blank_password']);
		}
		
		if (empty($this->data[$this->alias]['account_sid']) || strlen($this->data[$this->alias]['account_sid'])<=0) {
			$this->data[$this->alias]['account_sid'] = hash_hmac('ripemd160', $this->data[$this->alias]['username'] . $this->data[$this->alias]['created'], 'Pri8PrcL4pRm');
		}
		
		return true;
	}	
}
