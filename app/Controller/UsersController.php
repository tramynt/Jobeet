<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
    public $uses = array('User');
    
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Flash');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login', 'logout');
    }

    public function register() {
        if ($this->request->is('post')) {
           $this->User->create();
            if ($this->User->add($this->request->data)) {
                $this->Flash->success(__('The user has been registered.'));
                return $this->redirect(array('controller' => 'jobs', 'action' => 'find'));
            } else {
                $this->Flash->error(__('The user could not be registered. Please, try again.'));
            }
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'add'));
    }
    
    public function edit() {
        $userId = $this->Auth->user('id');
        
        $this->User->id = $userId;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->add($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.id' => $userId));
            $this->request->data = $this->User->find('first', $options);
        }
        public function user_list(){
             $fields = array('User.id', 'User.username', 'User.email');
             $users= $this->User->get($fields);
             $this->set(compact('users'));
        }
    }
}
?>