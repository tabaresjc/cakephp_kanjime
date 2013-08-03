<?php
App::uses('AppController', 'Controller');
/**
 * Newsletters Controller
 *
 */
class NewslettersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$message = __('The email has been registered');
			$error = 0;
			
			$count = $this->Newsletter->find('count', array(
				'conditions' => array('email' => $this->request->data['Newsletter']['email'])
			));
			
			if($count<=0){
				$this->Newsletter->create();
				if (!$this->Newsletter->save($this->request->data)) {
					$error = 1;
					$message = __('The email could not be saved. Please, try again.');					
				}
			} else {
				$message = __('The email has already been registered');
			}
			
			//if($this->request->is('isajax')){
				$response_data['message'] = $message;
				$response_data['error'] = $error;
				return new CakeResponse(array('body'=> json_encode($response_data), 'status' => 200));		
			// }else{
				// $this->Session->setFlash(__('Collection was not deleted'), $error == 1 ? 'flash/error' : 'flash/success');
				// $this->redirect('/');
			// }
		}
	}
}
