<?php
App::uses('AppModel', 'Model');

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel // Tại sao phải extends AppModel
{
    /**
     * Model Attributes
     */
    public $useTable = 'users'; // Attribute này là gì?
    public $tablePrefix = '';   // Attribute này là gì?
    public $primaryKey = 'id';  // Attribute này là gì?
    public $displayField = 'name'; // Attribute này là gì?
    public $recursive = 1;      //  Attribute này là gì?
    public $order = array('User.id' => 'ASC'); //Attribute này là gì?

    public $validate = array(
        'username' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter username'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 127),
                'message' => 'Max length is 127 characters'
            )
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter password'
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter email'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 511),
                'message' => 'Max length of email is 511 characters'
            ),
            'unique' => array(
                'rule' => array('isUnique', array('email'), false),
                'message' => 'Email existed'
            )
        ),
        'skills' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter skills'
            ),
        )
    );

    /**
     * Các hàm CRUD cơ bản
     */
    public function add($data = array())
    {
        return $this->save($data);
    }

    public function edit($id = 0, $data = array())
    {
        $this->id = $id;
        return $this->save($data); // Kết quả trả về là gì?
    }

    public function deleteUser($id = 0)
    {
        return $this->delete($id); // Kết quả trả về là gì?
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}

?>