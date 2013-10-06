<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {
	protected $allowedOrderFields = array(
		'name',
		'email',
		'comments',
		'payment_kind', 
		'payment_key', 
		'payment_status', 
		'payment_description', 
		'payment_amount',
		'payment_env'
	);

	protected $paginate = array(
		'limit' => 10
	);
	
	public function beforeFilter () {        
        parent::beforeFilter();
		$this->Security->unlockedActions = array('add');
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
			$limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : '10';
			
			if(!preg_match('/^[1-9][0-9]*$/',$offset) || !preg_match('/^[1-9][0-9]*$/',$limit)) {
				$msg = sprintf(__('Please check if "offset" or "limit" are set as numeric numbers from 1 to 999999'));
				return $this->Rest->abort(array('status' => '400', 'error' => $msg));		
			}
			
			$options = array('limit' => $limit, 'offset'=> $offset - 1 );
			
			$data['orders'] = $this->Order->find('all', $options);
			$data['total'] = $this->Order->find('count', $options);
			
			$data['offset'] = $offset;
			$data['limit'] = $limit;
			
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
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$data = $this->Order->find('first', $options);
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
			
			$keys = array_keys($this->request->data['Order']);
			foreach($keys as $k) {
				if(!array_search($k, $allowedOrderFields)){
					unset($this->request->data['Order'][$k]);
				}
			}

			if ($this->Order->save($this->request->data)) {
				$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $this->Order->id));
				$order = $this->Order->find('first', $options);
				
				$data['message'] = 'The order has been saved';
				$data['order_id'] = $order['Order']['id'];
				$data['order_token'] = $order['Order']['token'];
			} else {
				return $this->Rest->abort(array('status' => '400', 'error' => __('The order could not be saved. Please, try again.')));
			}			
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
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
