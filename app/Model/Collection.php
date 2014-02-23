<?php
App::uses('AppModel', 'Model');
App::uses('Security', 'Controller/Component');
/**
 * Collection Model
 *
 */
class Collection extends AppModel {
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        ),
        'subtitle' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A subtitle is required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A description is required'
            )
        ),
		'body' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'The body of the document is required'
            )
        ),
        'url_video' => array(
            'required' => array(
                'rule' => array('maxLength', '512'),
                'message' => 'Use up to 512 characters',
                'allowEmpty' => true
            ),
            'valid' => array(
                'rule' => 'url',
                'message' => 'Please check the url (http(s)://domain.com/path/to/video)',
                'allowEmpty' => true
            )            
        ),
        'status' => array(
            'valid' => array(
                'rule' => array('inList', array('1', '2')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
        )		
    );
	
    public function beforeSave($options = array()) {
        // Save the hash of the entire record
        $record_string = '';
        $record_string .= $this->data[$this->alias]['title'];
        $record_string .= $this->data[$this->alias]['subtitle'];
        $record_string .= $this->data[$this->alias]['description'];
        $record_string .= $this->data[$this->alias]['title'];
        $record_string .= $this->data[$this->alias]['body'];
        $record_string .= $this->data[$this->alias]['url_video'];
        $this->data[$this->alias]['hash'] = Security::hash($record_string, 'sha1', true);
        return true;
    }    
}
