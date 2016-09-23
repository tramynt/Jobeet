<?php App::uses('AppModel', 'Model');

class Category extends AppModel {

    public function get($conditions = array()) {
        return $this->find('list', array(
            'conditions' => $conditions,
            'recursive' => -1,
            'fields' => array('name'),
            'order' => array('name' => 'ASC'),
            'group' => array('id'),
        ));
    }
    
    public function add($data = array()) {
        return $this->save($data);
    }

    public function edit($id = 0, $data = array()) {
        $this->id = $id;
        return $this->save($data);
    }
}
?>