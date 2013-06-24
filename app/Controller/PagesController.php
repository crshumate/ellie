<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 */
class PagesController extends AppController {

public function beforeFilter(){
	$this->Security->unlockedActions = array('admin_add', 'admin_edit');
	$publishOptions  = array(0=>"Not Published", 1=>"Published");
	$this->set('publishOptions', $publishOptions);
	
	$this->set('user',$this->Auth->user());
	$this->Auth->allow('view');

	
}

	public function view($slug = null) {
		$site = $this->Page->Site->getSite();
		$site_name = $this->Page->Site->getSiteName($site);
		$options = array('conditions' => array('Page.slug'=>$slug));
		$page = $this->Page->find('first', $options);
		$pageTitle=$site_name." : ".$page['Page']['title'];
		$this->set('title_for_layout', $pageTitle );
		
		$this->set('page', $page);
	}

	public function admin_index() {
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

	public function admin_view($slug = null) {
		$site = $this->Page->Site->getSite();
		$site_name = $this->Page->Site->getSiteName($site);
		
		$options = array('conditions' => array('Page.slug'=>$slug));
		$page = $this->Page->find('first', $options);
		
		$this->set('title_for_layout',$site['Site']['site_name']." : ".$page['Page']['title']);
		$this->set('page', $page);
	}
	


	public function admin_add() {
		if ($this->request->is('post')) {
			$data=$this->request->data;
			$this->Page->create();
			if ($saved=$this->Page->save($data)) {
				if(!empty($data['Image']['images'])){
					foreach($data['Image']['images'] as $image){
						$arr=array();
						$arr['Image']['id']=$image;
						$arr['Image']['page_id'] = $saved['Page']['id'];
						$this->Page->Image->save($arr);
					}
				}
				$this->Session->setFlash(__('The page has been saved'));
				$this->redirect(array('controller'=>'pages','action' => 'view', $saved['Page']['slug'], 'admin'=>true));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		
		if ($this->request->is('post') || $this->request->is('put')) {
				$data=$this->request->data;

			if ($saved = $this->Page->save($data)) {

					if(!empty($data['Image']['images'])){
						foreach($data['Image']['images'] as $image){
							$arr=array();
							$arr['Image']['id']=$image;
							$arr['Image']['page_id'] = $saved['Page']['id'];
							$this->Page->Image->save($arr);
						}
					}
				
				$this->Session->setFlash(__('The page has been saved'));
				$this->redirect(array('action' => 'view', $saved['Page']['slug']));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		} else {
			$images = $this->Page->Image->find('all', array(
				'conditions'=>array('Image.page_id'=>$id),
				'recursive'=>-1
					));
			$this->set('images', $images);
			$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
			$this->request->data = $this->Page->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Page->delete()) {
			$images = $this->Page->Image->find('all', array('conditions'=>array('Image.page_id'=>$id)));
			if(!empty($images)){
				foreach($images as $image){
					unlink(IMAGES.$image['Image']['filename']);
					$this->Page->Image->delete($image['Image']['id']);
				}
				
				
			}
		
			
			$this->Session->setFlash(__('Page deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Page was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
