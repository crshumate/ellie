<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 */
class Page extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */

	public $hasMany=array('Image');
	public $hasOne = array('Site');
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
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
	
/*	public $virtualFields=array(
		'slug'=>'LOWER(Page.title)',
		'description' => 'CONCAT(SUBSTRING(Page.content, 1, 255),"...")'
	
		
	);*/
	

public function getSite (){

		return $this->Site->find('first');

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

	
