<?php
App::uses('AppModel', 'Model');

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
        )		
    );
}
