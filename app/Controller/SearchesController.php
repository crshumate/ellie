<?php
App::uses('AppController', 'Controller');
/**
 * Searches Controller
 *
 * @property Search $Search
 */
class SearchesController extends AppController {

	public function beforeFilter(){
		$this->set('paginateMin', 10);
		$this->Auth->allow('index');
		
		$site = $this->Search->Site->getSite();
		$this->set('footer_text', $this->Search->Site->getFooter($site));
		$site_name = $this->Search->Site->getSiteName($site);
		$this->set('site_name', $site_name );
		
		
		$this->set('user',$this->Auth->user());
		
		$this->set('title_for_layout', $site_name." : Search");
	}
	public $paginate = array(
			'Post'=>array(
			'limit' => 10,
	        'order' => array(
	            'Post.created' => 'desc'
	        )
		 )
	    );

  	public function index(){
			if($this->request->is('get')){
				$data = $this->request->query;
				if(isset($data['search']) && !empty($data['search'])){
					$keyword = $data['search'];
					$postCond=array('OR'=>array("Post.title LIKE '%$keyword%'","Post.content LIKE '%$keyword%'"));
					$pageCond=array('OR'=>array("Page.title LIKE '%$keyword%'","Page.content LIKE '%$keyword%'"));

					$list= $this->paginate('Post',array($postCond));
					$this->set('list', $list);
				}
			
			
		}
	
	
}

}
