<?php
App::uses('AppController', 'Controller');
/**
 * Commons Controller
 *
 * @property Common $Common
 */
class CommonsController extends AppController {


public function beforeFilter(){
	$this->Auth->allow('categories', 'posts','pages', 'site_name', 'footer_text');
}

public function categories(){
	$this->autoRender=false;
	$categories = $this->Common->Category->find('all');
	if ($this->request->is('requested')) {
            return $categories;
        } 

}

public function posts(){
	$this->autoRender=false;
	$posts = $this->Common->Post->find('all');
	if ($this->request->is('requested')) {
            return $posts;
        } 

}

public function pages(){
	$this->autoRender=false;
	$pages = $this->Common->Page->find('all', array(
		'conditions'=>array('Page.published'=>1),
		'order' => array('Page.position' => 'ASC'),));
	if ($this->request->is('requested')) {
            return $pages;
        } 

}

public function site_name(){
	$this->autoRender=false;
	$site = $this->Common->Site->find('first');
	
	if ($this->request->is('requested')) {

		if($site['Site']['site_name']){
			return $site['Site']['site_name'];
		}else{
			return "Ellie";
		}
	}

	


}

public function footer_text(){
	$this->autoRender=false;
	$site = $this->Common->Site->find('first');
	
	if ($this->request->is('requested')) {

		if($site['Site']['footer_text']){
			return $site['Site']['footer_text'];
		}else{
			return "This is the placeholder footer text. As a note - admin pages need to be built in to update 
			the sites table";
		}
	}


}


}
