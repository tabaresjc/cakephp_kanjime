<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public $paginate = array(
		'limit' => 10
	);
	
	// public function beforeFilter() {
		// parent::beforeFilter();
		// $this->Auth->allow();
	// }

	// public function initDB() {
		// $group = $this->User->Group;
		// //Allow admins to everything
		// $group->id = 1;
		// $this->Acl->allow($group, 'controllers');
		// //$this->Acl->allow($group, 'controllers/Collections/findKanji');
		
		// $group->id = 2;
		// $this->Acl->deny($group, 'controllers');
		// $this->Acl->allow($group, 'controllers/Admins/index');
		// $this->Acl->allow($group, 'controllers/Collections');
		// $this->Acl->allow($group, 'controllers/Users');
		
		// $group->id = 3;
		// $this->Acl->deny($group, 'controllers');
		// $this->Acl->allow($group, 'controllers/Admins/index');
		// $this->Acl->allow($group, 'controllers/Users/view');
		// $this->Acl->allow($group, 'controllers/Users/login');
		// $this->Acl->allow($group, 'controllers/Users/logout');
		
		// echo "all done";
		// exit;
	// }
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Session->read('Auth.User');
			
				$this->Session->setFlash('Welcome '. $user['name'] . '!', 'flash/success');
				$this->redirect($this->Auth->loginRedirect);				
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect.'), 'flash/error');
				$this->redirect($this->Auth->logout());
			}
		} else if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('You are logged in!', 'flash/success');
			$this->redirect($this->Auth->loginRedirect);
		}
	}

	public function logout() {
		$this->Session->delete('Auth.Permissions');
		$this->Session->setFlash('Good-Bye', 'flash/success');
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$query = '';
		if(isset($this->request->query['q'])) {
			$query = $this->request->query['q'];
            $this->paginate['conditions'][]['User.name LIKE'] = "%$query%";
        }
		$this->set('query', $query);
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$count = $this->User->find('count', array(
				'conditions' => array('User.username' => $this->request->data['User']['username'])
			));
			
			if($count>0){
				$this->Session->setFlash(__('This User Name already exist. Please try another name'), 'flash/error');
			}
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {			
			$data = array(
				'username' => '',
				'password' => '',
				'confirm_password' => '',
				'email' => '',
				'address' => ''
			);
			$this->data = array('User' => $data );
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			$this->request->data['blank_password'] = '';
			$this->request->data['blank_password_confirm'] = '';
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function search() {
		if(isset($this->request->query['query'])) {
			$this->redirect(array('action' => 'index','?' => array('q' => $this->request->query['query'])));
        } else {
			$this->redirect(array('action' => 'index'));
		}
		
	}
}
