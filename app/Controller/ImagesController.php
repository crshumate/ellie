<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {


public function beforeFilter(){
		$this->Security->unlockedActions = array('admin_add', 'admin_delete');
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->autoLayout = false;
		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->autoLayout=false;
		if ($this->request->is('post')) {
			$data=$this->request->data;
			//submit the whole image object ($data)so it works with validation
			//add extra array slot for filename since that is the only data being submitted to db at this point...
			
			$data['Image']['filename']= $data['Image']['image']['name'];
			
			$matches = $this->Image->checkMatches($data['Image']['filename']);
			
			if($matches){
			 	$strArray=explode(".", $data['Image']['filename']);
				$file = $strArray[0].rand(0,100000);
				$extension = $strArray[1];
				$data['Image']['filename'] = $file.".".$extension;	
			}
			$this->Image->create();
			if ($saved = $this->Image->save($data)) {
				$uploadPath = IMAGES;
				move_uploaded_file($data['Image']['image']['tmp_name'],$uploadPath.$data['Image']['filename']);
				$this->redirect(array('action' => 'view', $saved['Image']['id']));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
			$this->request->data = $this->Image->find('first', $options);
		}
		$pages = $this->Image->Page->find('list');
		$posts = $this->Image->Post->find('list');
		$this->set(compact('pages', 'posts'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id=null) {
		$this->Image->id = $id;
		$this->autoRender=false;
		if($this->Image->delete()){
			return 'success';
		}else{return 'fail';}
	
	}
}
