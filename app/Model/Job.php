<?php
App::uses('AppModel', 'Model');

class Job extends AppModel {

    public $belongsTo = array(
        'Category' => array(
                'className' => 'Category',
                'foreignKey' => 'category_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
        ),
        'User' => array(
                'className' => 'User',
                'foreignKey' => 'creator',
                'conditions' => '',
                'fields' => '',
                'order' => ''
        )
    );
    
    public $validate = array(
        'category_id' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter category_id'
            )
        ),
        'creator' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter creator'
            ),
        ),
        'title' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter title'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => 'Max length of title is 255 characters'
            ),
        ),
    );

    public function get($conditions = array(), $fields = array()) {
        return $this->find('all', array(
        	'conditions' => $conditions,
        	'contain' => array('Job', 'Category'),
        	'fields' => $fields
    	));
    }

    public function getJobById($conditions = array(), $fields = array()) {
        return $this->find('first', array(
            'conditions' => $conditions,
            'recursive' => 0,
            'fields' => $fields
        ));
    }

    public function add($data = array()) {
    	return $this->save($this->request->data);
    }

    public function edit($id = 0, $data = array()) {
        $this->id = $id;
        return $this->save($data); // Kết quả trả về là gì?
    }

    public function deleteUser($id = 0) {
        return $this->delete($id); // Kết quả trả về là gì?
    }
}
?>