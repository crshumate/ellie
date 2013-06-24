<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Post.created' => 'desc'
        )
    );
   public function beforeFilter(){
	
	$this->set('paginateMin', 10);
	//Use this for jQuery Posts to work with Security Component
	//$this->Security->unlockedActions = array('admin_ajax_add');
	
	$this->Security->unlockedActions = array('admin_add', 'admin_edit');
	$this->Auth->allow('view', 'index', 'category');
	
	$this->set('user', $this->Auth->user());
	
	$cats = $this->Post->Category->find('all');
	$catOptions = array();
	foreach($cats as $cat){
		$catOptions[$cat['Category']['id']]=$cat['Category']['type'];
	}
	$this->set('catOptions', $catOptions);
	
	$publishOptions  = array(0=>"Not Published", 1=>"Published");
	$this->set('publishOptions', $publishOptions);
		
}
	public function index() {
		$site = $this->Post->Site->getSite();
		$site_name = $this->Post->Site->getSiteName($site);

		$this->set('title_for_layout', $site_name.":Posts");
		$this->Post->recursive = 0;
		$posts = $this->paginate('Post', array('Post.published'=>1));
		$this->set('posts', $posts);

	}
	
	public function category($catType=null){
		$site = $this->Post->Site->getSite();
		$site_name = $this->Post->Site->getSiteName($site);

		$this->set('title_for_layout', $site_name." : ".$catType);
	    $category = $this->Post->Category->findByType($catType);
		 $posts = $this->paginate('Post', array('Post.category_id'=>$category['Category']['id'],
		'Post.published'=>1));
		$this->set('category', $catType);
		$this->set('posts', $posts);
	}


	public function view($slug = null) {
		$options = array('conditions' => array('Post.slug'  => $slug));
		$post = $this->Post->find('first', $options);
		$this->set('post', $post);
		$site = $this->Post->Site->getSite();
		$site_name = $this->Post->Site->getSiteName($site);
		$this->set('title_for_layout',$site_name." : ".$post['Post']['title']);
	}


	public function admin_view($id = null) {
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$post = $this->Post->find('first', $options);
		$this->set('post', $post);
		
		$site = $this->Post->Site->find('first');
		$this->set('title_for_layout',$site['Site']['site_name']." : ".$post['Post']['title']);
	}

	public function admin_category($catType=null){
			$this->set('title_for_layout',$this->Post->setPageTitle($catType));
		    $category = $this->Post->Category->findByType($catType);
			$posts = $this->paginate('Post', array('Post.category_id'=>$category['Category']['id']));
			$this->set('category', $catType);
			$this->set('posts', $posts);
	}
	
	public function admin_add() {		
		if ($this->request->is('post')) {
			
			$data = $this->request->data;
			$data['Post']['user_id']=$this->Auth->user('id');
				/*$data['Post']['content'] = "<p>" . implode( "</p>\n\n<p>", preg_split( '/\n(?:\s*\n)+/', $data['Post']['content'] ) ) . "</p>";*/
		
			$this->Post->create();
			if ($saved = $this->Post->save($data)) {
				if(!empty($data['Image']['images'])){
				foreach($data['Image']['images'] as $image){
					$arr=array();
					$arr['Image']['id']=$image;
					$arr['Image']['post_id'] = $saved['Post']['id'];
					$this->Post->Image->save($arr);
				}
			}
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'view', $saved['Post']['id']));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}
	

	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$data= $this->request->data;		
			if ($saved = $this->Post->save($data)) {
				
				if(!empty($data['Image']['images'])){
					foreach($data['Image']['images'] as $image){
						$arr=array();
						$arr['Image']['id']=$image;
						$arr['Image']['post_id'] = $saved['Post']['id'];
						$this->Post->Image->save($arr);
					}
			}
								
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'view', $saved['Post']['id']));	
				} else {
					$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
				}
				
				
		
			} else {
				$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
				$this->request->data = $this->Post->find('first', $options);
			}
			$images = $this->Post->Image->find('all', array(
				'conditions'=>array('Image.post_id'=>$id),
				'recursive'=>-1
				));
			$users = $this->Post->User->find('list');
			$this->set('images', $images);
			$this->set(compact('users'));
	}


	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$images = $this->Post->Image->find('all', array('conditions'=>array('Image.post_id'=>$id)));
			if(!empty($images)){
				foreach($images as $image){
					unlink(IMAGES.$image['Image']['filename']);
					$this->Post->Image->delete($image['Image']['id']);
				}
				
				
			}
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}


	public function admin_delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$image = $this->Post->Image->findByPostId($id);
			unlink(IMAGES.$image['Image']['filename']);
			$this->Post->Image->deleteAll(array('Image.post_id'=>$id));
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
