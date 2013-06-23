<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Page $Page
 * @property Post $Post
 */
  
class Image extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'wb';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	
	
public $validate = array(
	    'image' => array(
	        'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
	        'message' => 'Please supply a valid image.'
	    )
	);
	

	public function checkMatches($filename){
		
		$matches = $this->find('all', array(
						'conditions'=>array(
										"Image.filename"=>$filename
									),
									'recursive'=>-1
								)
					);
					
					if(!empty($matches)){
						return $matches;
					}else{
						return null;
					}
		
	}
	

	
	

	
	
}



