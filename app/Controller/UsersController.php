<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
		$this->Auth->allow('checkUserName');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
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
				'conditions' => array('User.username' => $this->request->data['User']['name'])
			));
			
			if($count>0){
				$this->Session->setFlash(__('This User Name already exist. Please try another name'), 'flash/error');
			}else{		
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
				}
			}
		} else {			
			$data = array(
				'username' => '',
				'password' => '',
				'confirm_password' => '',
				'role' => 'Admin',
			);
			$this->data = array( 'User' => $data );
		}
	}
	
	public function checkUserName() {
		if ($this->request->is('post')) {
			$response_data = array();
			$response_data['username'] = $this->request->data['username'];
			
			$response_data['error'] = 0;
			$response_data['message'] = '';
			
			$count = $this->User->find('count', array(
				'conditions' => array('User.username' => $response_data['username'])
			));
			
			if($count>0){
				$response_data['error'] = 1;
				$response_data['message'] = __('This username already exist. Please try another name');
			} else{
				$response_data['message'] = __('This username is avalaible!');
			}
			
			
			return new CakeResponse(array('body'=> json_encode($response_data), 'status' => 200));
		}
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
		}
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
}