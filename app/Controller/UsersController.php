<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public function beforeFilter(){  

		$this->Auth->allow(array('login','logoout', 'search', 'add', 'index', 'lost_password'));
		$this->set('user', $this->Auth->user());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	 public function dashboard(){
		$user = $this->Auth->user();
		$admin_dashboard = array('action'=>'dashboard', 'admin'=>true);
		if($user['role_id']==1) $this->redirect($admin_dashboard);
		
	}	
	
	
	public function login() {
	    if($this->request->is('post')) {
	      // try and hash the password
	      if($this->Auth->login()) {
	        $this->redirect($this->Auth->redirect());
	      } else {
		
	        $this->Session->setFlash('Username or password is incorrect.');
	      }
	    }
	  }
	
	
	public function logout() {
	    $this->redirect($this->Auth->logout());
	  }

	  public function add() {
		if ($this->request->is('post')) {
			$data= $this->request->data;
			
			//assign user to site
			$data['User']['site_id']=1;
			//hash pw
			$data['User']['password'] = AuthComponent::password($data['User']['password']);
			
			$this->User->create();
			
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

  	
  	public function lost_password(){
  		if($this->request->is('post')){
  			$data = $this->request->data;
  			$user = $this->User->findByEmail($data['User']['email']);
  			
  			if($user){
  				$opts = array();
				$opts['site_email'] = $user['Site']['site_email'];
  				$opts['email']=$user['User']['email'];
  				
  				$this->User->sendNewPw($opts);

  				$this->Session->setFlash(__('Email is on its way!'));
  				$this->redirect('');
  			}else{
  				$this->Session->setFlash(__('This email is not associated with a user account. Please try again.'));

  			}

  		}
  	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
    public function admin_dashboard(){
	
	}  

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$data= $this->request->data;
			//assign user to site
			$data['User']['site_id']=1;
			//hash pw
			$data['User']['password'] = AuthComponent::password($data['User']['password']);

			$this->User->create();
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
