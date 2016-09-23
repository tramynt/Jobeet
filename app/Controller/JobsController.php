<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class JobsController extends AppController {
    public $uses = array('Category', 'Job', 'Application'); // Khai báo này làm gì?
    public $components = array('Flash', 'Paginator');
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function post() {
        $categories=$this->Category->get();
        $this->set(compact('categories'));
        if ($this->request->is('post')) {
            $this->request->data['Job']['creator'] = $this->Auth->user('id');
            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(array('controller' => 'jobs', 'action' => 'find'));
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
    }

    public function find() {
        $conditions = array();
        $data = $this->request->query;
        $this->request->data['Job'] = $data;
        if (!empty($data['job_id'])) {
                $conditions['Job.id'] = $data['job_id'];
        }

        if (!empty($data['category_id'])) {
                $conditions['Job.category_id'] = $data['category_id'];
        }
        
        $fields = array('Job.id', 'Job.created', 'Category.name');

        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'contain' => array('Job', 'Category'),
            'fields' => $fields,
            'limit' => 10,
            'order' => 'Job.modified DESC'
        );

        $jobs = $this->Paginator->paginate('Job');
        $categories = $this->Category->get();
        $this->set(compact('categories', 'jobs'));
    }

    public function apply($jobId = null) {
        if (!$this->Job->exists($jobId)) {
                throw new NotFoundException(__('Invalid Job'));
        }
        
        $fields=array('Job.id', 'Category.name', 'User.id', 'User.username');
        $conditions = array('Job.id' => $jobId);
        $job = $this->Job->getJobById($conditions, $fields);
        $this->set(compact('job'));
      
        if ($this->request->is('post')) {
            $this->Application->create();
            if ($this->Application->save($this->request->data)) {
                $this->Flash->success(__('The application has been saved.'));
                return $this->redirect(array('controller' => 'jobs', 'action' => 'find'));
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
    }

    public function delete($id = null) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid job'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Job->delete()) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'find'));
    }
    
    public function edit($id = null) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid job'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Job->save($this->request->data)) {
                    $this->Flash->success(__('The job has been saved.'));
                    return $this->redirect(array('action' => 'find'));
            } else {
                    $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Job.id' => $id));
            $this->request->data = $this->Job->find('first', $options);
            $categories=$this->Category->get();
            $this->set(compact('categories'));
        }
    }
}