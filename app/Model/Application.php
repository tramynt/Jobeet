<?php
App::uses('AppModel', 'Model');
/**
 * Application Model
 *
 * @property Job $Job
 * @property User $User
 */
class Application extends AppModel {


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Job' => array(
            'className' => 'Job',
            'foreignKey' => 'job_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    public $validate = array(
        'job_id' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please choose job_id'
            ),
        ),
        'user_id' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please choose user_id'
            ),
        ),
        'message' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter message'
            ),
        ),
    );
}
