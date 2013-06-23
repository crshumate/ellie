<?php
App::uses('AppModel', 'Model');
/**
 * Site Model
 *
 * @property Posts $Posts
 * @property Pages $Pages
 * @property Search $Search
 */
class Site extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'wb';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'site';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	public function getSite (){

		return $this->find('first');

	}

	public function getFooter($site){
		
		$footer_text = $site['Site']['footer_text'];
		if($footer_text){
			return $footer_text;
		}else{
			return "This is the placeholder footer text. As a note - admin pages need to be built in to update 
			the sites table";
		}
	}

	public function getSiteName($site){
		if($site['Site']['site_name']){
			return $site['Site']['site_name'];
		}else{
			return "Ellie";
		}
	}


}
