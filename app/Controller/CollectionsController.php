<?php
App::uses('AppController', 'Controller');

/**
 * Collections Controller
 *
 * @property Collection $Collection
 */
class CollectionsController extends AppController {

	

	public $paginate = array(
		'limit' => 10
	);
	
	public function beforeFilter () {
        if (!$this->Auth->user()) {
            // Try to login user via REST
            if ($this->Rest->isActive()) {
                $this->Auth->autoRedirect = false;
				$this->loadModel('User');
				$this->loadModel('Group');
				$credentials = $this->Rest->credentials(true);
                $user = $this->User->find('first', array(
					'conditions' => array('User.username' => $credentials['username'],
										  'User.account_sid' => $credentials['account_sid'])
				));
                
                if (!empty($user) /*&& $this->Auth->login($user)*/) {
					$this->Auth->allow($this->params['action']);
					$this->Session->destroy();
				}else {
                    $msg = sprintf('Unable to log you in with the supplied credentials. ');
                    return $this->Rest->abort(array('status' => '403', 'error' => $msg));
                }
            }
        }
        parent::beforeFilter();
		$this->Security->unlockedActions = array('findkanji');
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
			$data['collections'] = $this->Collection->find('all', $options);
			$data['total'] = $this->Collection->find('count');
			$data['offset'] = $offset;
			$data['limit'] = $limit;
			
			$this->set(compact('data'));
		} else {
			$this->Collection->recursive = 0;
			$query = '';
			if(isset($this->request->query['q'])) {
				$query = $this->request->query['q'];
				$this->paginate['conditions'][] = array(
					'OR' => array(
						'Collection.title LIKE' => "%$query%",
						'Collection.subtitle LIKE' => "%$query%",
						'Collection.description LIKE' => "%$query%"
					)
				);
			}
			$collections = $this->paginate();
			$this->set(compact('collections','query'));
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
			if (!$this->Collection->exists($id)) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid collection')));
			}
			$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
			$data = $this->Collection->find('first', $options);
			$this->set(compact('data'));
		} else {
			if (!$this->Collection->exists($id)) {
				throw new NotFoundException(__('Invalid collection'));
			}
			$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
			$this->set('collection', $this->Collection->find('first', $options));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$count = $this->Collection->find('count', array(
				'conditions' => array('Collection.title' => $this->request->data['Collection']['title'])
			));
			
			if($count>0){
				$this->Session->setFlash(__('This name already exist. Please try another name'), 'flash/error');
			}else{
				$this->Collection->create();
				if ($this->Collection->save($this->request->data)) {
					$this->Session->setFlash(__('The collection has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The collection could not be saved. Please, try again.'), 'flash/error');
				}
			}
		} else {			
			$data = array(
				'title' => '',
				'subtitle' => '',
				'description' => '',
			);
			$this->data = array('Collection' => $data );
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
			$data = array();
			$this->Collection->id = $id;
			
			if (!$this->Collection->exists()) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid collection')));
			} else {
				
			}
			$this->set(compact('data'));		
		} else {
			if (!$this->Collection->exists($id)) {
				throw new NotFoundException(__('Invalid collection'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Collection->save($this->request->data)) {
					$this->Session->setFlash(__('The collection has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The collection could not be saved. Please, try again.'), 'flash/error');
				}
			} else {
				$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
				$this->request->data = $this->Collection->find('first', $options);
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
			$this->Collection->id = $id;
			
			if (!$this->Collection->exists()) {
				return $this->Rest->abort(array('status' => '400', 'error' => __('Invalid collection')));
			} else {
				if ($this->Collection->delete()) {
					$data['message'] = __('Collection deleted');
				} else {
					return $this->Rest->abort(array('status' => '400', 'error' => __('Fail to delete the collection')));			
				}
			}
			$this->set(compact('data'));
			
		} else {
			$this->Collection->id = $id;
			if (!$this->Collection->exists()) {
				throw new NotFoundException(__('Invalid collection'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->Collection->delete()) {
				$this->Session->setFlash(__('Collection deleted'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Collection was not deleted'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}
	}
/**
 * REST Index method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */	
	public function apiv1_index() {
		$data = array();
		$offset = isset($this->request->query['offset']) ? $this->request->query['offset'] : '1';
		$limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : '10';
		
		if(!preg_match('/^[1-9][0-9]*$/',$offset) || !preg_match('/^[1-9][0-9]*$/',$limit)) {
			$msg = sprintf(__('Please check if "offset" or "limit" are set as numeric numbers from 1 to 999999'));
			return $this->Rest->abort(array('status' => '400', 'error' => $msg));		
		}
		
		$options = array('limit' => $limit, 'offset'=> $offset - 1 );
		$data['collections'] = $this->Collection->find('all', $options);
		$data['total'] = $this->Collection->find('count');
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		$this->set(compact('data'));
	}
/**
 * REST View method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */	
	public function apiv1_view($id = null) {
		if (!$this->Collection->exists($id)) {
			$msg = sprintf('Invalid collection');
			return $this->Rest->abort(array('status' => '400', 'error' => $msg));
		}
		$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
		$data = $this->Collection->find('first', $options);
		
		$this->set(compact('data'));
	}	
	
	public function search() {
		if(isset($this->request->query['query'])) {
			$this->redirect(array('action' => 'index','?' => array('q' => $this->request->query['query'])));
        } else {
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function findkanji() {
	
		if ($this->request->is('post')) {
			$response_data = array();
			$error = array();
			$list = array();
			if(!empty($this->request->data['title']) && !empty($this->request->data['subtitle']) && !empty($this->request->data['description'])){
				$response_data['Name'] = $this->request->data['title'];
				$response_data['Kanji'] = $this->request->data['subtitle'];
				$response_data['Katakana'] = $this->request->data['description'];
				$error = array();
				
				$xmlfile = dirname(__FILE__) . DIRECTORY_SEPARATOR. 'Component' . DIRECTORY_SEPARATOR. 'kanjidic2.xml';
				$xmlDoc = new DOMDocument();
				
				if($xmlDoc->load($xmlfile)){
					$xpath = new DomXpath($xmlDoc);
					foreach($this->mbStringToArray($response_data['Kanji']) as $char) {
						$object['kanji'] = $char;
						$kun_y = array();
						$on_y = array();
						$m_y = array();
						
						$query = '//character[literal="'.$char.'"]';
						$matchingNodes = $xpath->query($query);	
						if($matchingNodes->length>0){
							//Query kun yomi of the kanji
							$child_node = $xpath->query('./reading_meaning/rmgroup/reading[@r_type="ja_kun"]',$matchingNodes->item(0));	
							foreach ($child_node as $element) {
								$kun_y[] = preg_replace('(-)','',$element->nodeValue);
							}
							
							//Query kun yomi of the kanji
							$child_node = $xpath->query('./reading_meaning/rmgroup/reading[@r_type="ja_on"]',$matchingNodes->item(0));	
							foreach ($child_node as $element) {
								$on_y[] = preg_replace('(-)','',$element->nodeValue);
							}
							
							//Query meaning of the kanji in english
							$query = './reading_meaning/rmgroup/meaning[not(@*)]';
							$child_node = $xpath->query($query,$matchingNodes->item(0));			
							foreach ($child_node as $element) {
								$m_y[] = $element->nodeValue;
							}
						} else {
							$error[] = "[ " . $char . " ] can not be found in japanese dictionary";
						}
						$object['kunyomi'] = implode(', ',$kun_y);
						$object['onyomi'] = implode(', ',$on_y);
						$object['meaning'] = implode(', ',$m_y);
						
						$list[] = $object;
					}
				}
				else {
					$error[] = "Error, opening the kanji dictionary";
				}
			}else{
				$error[] = "Missing or empty data";
			}
			$response_data['error'] = implode('<br/>',$error);
			$response_data['kanjiList'] = $list;
			return new CakeResponse(array('body'=> json_encode($response_data), 'status' => 200));
		}
		else {
			$this->Session->setFlash(__('Invalid Action'), 'flash/error');
			$this->redirect('/');
		}
	}	
	
	function mbStringToArray ($string) {
	  $strlen = mb_strlen($string);
	  while ($strlen) {
		$array[] = mb_substr($string,0,1,"UTF-8");
		$string = mb_substr($string,1,$strlen,"UTF-8");
		$strlen = mb_strlen($string);
	  }
	  return $array;
	}		
}
