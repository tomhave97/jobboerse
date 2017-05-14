<?php
class JobsController extends AppController {
    // Liste der helper & components 
    // muss bei verwendung hinzugefügt werden.

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index() {
        $this->set('jobs', $this->Job->find('all'));
    }

    public function view($id = null) {
        if(!$id) {
            throw new NotFoundException(__('Invalid Job'));
        }

        $job = $this->Job->findById($id);
        if(!$job) {
            throw new NotFoundException(__('Invalid Job'));
        }
        $this->set('job', $job);
    }

    public function add() {
        if($this->request->is('post')){
            $this->Job->create();
            if($this->Job->save($this->request->data)) {
                $this->Flash->success(__('Your Job has been Created.'));
                $job = $this->Job->findById($this->Job->getLastInsertId());
                $Email = new CakeEmail('gmail');
                $Email
                    ->to($job['Job']['email'])
                    ->emailFormat('html')
                    ->helpers('Html')
                    ->subject('Bestätigung ihrer Ausschreibung')
                    ->template('erstellt')
                    ->viewVars(array('token' =>  $job['Job']['token']))
                    ->send();

                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Failed Creating your Job'));
        }
    }

    public function edit($id = null){
        if(!$id) {
            throw new NotFoundException(__('Token fehlt'));
        }       

        $job = $this->Job->find('first', array(
        'conditions' => array('token' => $id)
         ));
        
        if(!$job){
            throw new NotFoundException(__('Invalid Job'));
        }

        if($this->request->is(array('post', 'put'))){
            $this->Job->id = $job['Job']['id'];
            if($this->Job->save($this->request->data)) {
                $this->Flash->success(__('Your Job has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your Job.'));      
        }
        if(!$this->request->data){
            $this->request->data = $job;
        }
            $this->set('job', $job);            
    }

    public function delete($id = null){
      
        if(!$id) {
            throw new NotFoundException(__('Token fehlt'));
        }       

        $job = $this->Job->find('first', array('conditions'=>array('token'=> $id)));

        if(!$job){
            throw new NotFoundException(__('Invalid Job'));
        }

        if($this->Job->delete($job['Job']['id'])) {
            $this->Flash->success(__('The Job with id: %s has been deleted.', h($id)));
        }
        else 
        {
            $this->Flash->error(__('The Job with id: %s could not be deleted.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
