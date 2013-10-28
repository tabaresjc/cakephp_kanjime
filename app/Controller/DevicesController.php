<?php
App::uses('AppController', 'Controller');
App::uses('RestUtilities', 'Lib');
/**
 * Devices Controller
 *
 * @property Device $Device
 */
class DevicesController extends AppController {
	protected $allowedCreateFields = array(
		'Device' => array(
			'token',
			'enabled'
		)
	);

	public $paginate = array(
		'limit' => 10
	);
	
	protected $RestUtilities;
	
	public function beforeFilter () {        
        parent::beforeFilter();
		if ($this->isRest()) {
			$this->Security->unlockedActions = array($this->params['action']);
		} else {
			$this->Security->unlockedActions = array('delete');
		}
		$this->RestUtilities = new RestUtilities();
    }
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		if($this->isRest()){
			return $this->Rest->abort(array('status' => '400', 'error' => __('Method not supported')));
		}	
		$this->Device->recursive = 0;
		$this->set('devices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if($this->isRest()){
			return $this->Rest->abort(array('status' => '400', 'error' => __('Method not supported')));
		}
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
		$this->set('device', $this->Device->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->isRest()){
			if (!$this->request->is('post')) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid request')));
			}
			$data = array();
			
			$request_data = $this->RestUtilities->filterFieldsOfRequest($this->request->data, $this->allowedCreateFields);
			$request_data['Device']['device_token'] = preg_replace('/\s+/', '', $request_data['Device']['token']);
			unset($request_data['Device']['token']);
			
			$options = array('conditions' => array('Device.device_token' => $request_data['Device']['device_token']));
			$count = $this->Device->find('count', $options);
			$device = null;
			
			if($count<=0){
				$this->Device->save($request_data);
			}
			$device = $this->Device->find('first', $options);
			
			if ($device) {				
				$data['message'] = 'The device has been saved';
				$data['device_id'] = $device['Device']['id'];				
			} else {
				return $this->Rest->abort(array('status' => '400', 'error' => __('The device could not be saved. Please, try again.')));
			}
			
			$data['status'] = "ok";
			$this->set(compact('data'));
		} else if ($this->request->is('post')) {
			$request_data = $this->request->data;
			
			$request_data['Device']['device_token'] = preg_replace('/\s+/', '', $request_data['Device']['device_token']);		
			$options = array('conditions' => array('Device.device_token' => $request_data['Device']['device_token']));
			$count = $this->Device->find('count', $options);
			
			if($count > 0) {				
				$device = $this->Device->find('first', $options);
				$request_data['Device']['id'] = $device['Device']['id'];
			} else {
				$this->Device->create();
			}
			
			if ($this->Device->save($request_data)) {
				$this->Session->setFlash(__('The device has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.'), 'flash/error');
			}
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
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Device->save($this->request->data)) {
				$this->Session->setFlash(__('The device has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
			$this->request->data = $this->Device->find('first', $options);
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
		$this->Device->id = $id;
		if (!$this->Device->exists()) {
			throw new NotFoundException(__('Invalid device'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Device->delete()) {
			$this->Session->setFlash(__('Device deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Device was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
