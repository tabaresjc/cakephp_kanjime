<?php
App::uses('AppController', 'Controller');
App::uses('RestUtilities', 'Lib');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {
	protected $allowedCreateFields = array(
		'Order' => array(
			'name',
			'email',
			'comments',
			'payment_kind', 
			'payment_key', 
			'payment_status', 
			'payment_description', 
			'payment_amount',
			'payment_currency',
			'payment_env'
		)
	);

	protected $allowedUpdateFields = array(
		'Order' => array(
			'name',
			'email',
			'comments',
			'token',
			'payment_kind', 
			'payment_key', 
			'payment_status', 
			'payment_description', 
			'payment_amount',
			'payment_currency',
			'payment_env'
		)
	);	
	
	protected $paginate = array(
		'limit' => 10
	);
	
	protected $RestUtilities;
	
	public function beforeFilter () {        
        parent::beforeFilter();
		if ($this->isRest()) {
			$this->Security->unlockedActions = array($this->params['action']);
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
			$data = array();
			$offset = isset($this->request->query['offset']) ? $this->request->query['offset'] : '1';
			$limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : '100';
			
			if(!preg_match('/^[1-9][0-9]*$/',$offset) || !preg_match('/^[1-9][0-9]*$/',$limit)) {
				$msg = sprintf(__('Please check if "offset" or "limit" are set as numeric numbers from 1 to 999999'));
				return $this->Rest->abort(array('status' => '400', 'error' => $msg));		
			}
			
			$options = array('limit' => $limit, 'offset'=> $offset - 1 );
			
			$data['orders'] = $this->Order->find('all', $options);
			$data['total'] = $this->Order->find('count', $options);
			
			$data['offset'] = $offset;
			$data['limit'] = $limit;
			
			$data['status'] = "ok";
			$this->set(compact('data'));
		} else {
			$this->Order->recursive = 0;
			$this->set('orders', $this->paginate());	
		}
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
			if (!$this->Order->exists($id)) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid order')));
			}
			$data = array();
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$data = $this->Order->find('first', $options);
			
			$data['status'] = "ok";
			$this->set(compact('data'));
		} else {	
			if (!$this->Order->exists($id)) {
				throw new NotFoundException(__('Invalid order'));
			}
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->set('order', $this->Order->find('first', $options));
		}
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
			
			if ($this->Order->save($request_data)) {
				$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $this->Order->id));
				$order = $this->Order->find('first', $options);				
				$data['message'] = 'The order has been saved';
				$data['order_id'] = $order['Order']['id'];
				$data['order_token'] = $order['Order']['token'];				
			} else {
				return $this->Rest->abort(array('status' => '400', 'error' => __('The order could not be saved. Please, try again.')));
			}
			
			$data['status'] = "ok";
			$this->set(compact('data'));			
		} else if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'flash/error');
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
		if($this->isRest()){
			if (!$this->request->is('put') && !$this->request->is('post')) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid request')));
			}
			$data = array();			
			if (!$this->Order->exists($id)) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid request, record not found')));
			}
			
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$order = $this->Order->find('first', $options);			
			
			if(!isset($this->request->data['Order']['token']) || strcmp($order['Order']['token'],$this->request->data['Order']['token'])!=0) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid token')));
			}
			
			$request_data = $this->RestUtilities->filterFieldsOfRequest($this->request->data, $this->allowedUpdateFields);
			$request_data['Order']['id'] = $id;
			
			if ($this->Order->save($request_data)) {				
				$data['message'] = 'The order has been updated';
			} else {
				return $this->Rest->abort(array('status' => '400', 'error' => __('The order could not be saved. Please, try again.')));
			}
			$data['status'] = "ok";
			$this->set(compact('data'));
		} else {
			if (!$this->Order->exists($id)) {
				throw new NotFoundException(__('Invalid order'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Order->save($this->request->data)) {
					$this->Session->setFlash(__('The order has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'flash/error');
				}
			} else {
				$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
				$this->request->data = $this->Order->find('first', $options);
			}
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
		if($this->isRest()){
			$data = array();
			
			$data['message'] = __('Method not supported');
			$data['status'] = "fail";
			$this->set(compact('data'));
		} else {		
			$this->Order->id = $id;
			if (!$this->Order->exists()) {
				throw new NotFoundException(__('Invalid order'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->Order->delete()) {
				$this->Session->setFlash(__('Order deleted'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Order was not deleted'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}
	}
}
