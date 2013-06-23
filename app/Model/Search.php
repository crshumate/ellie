<?php
App::uses('AppModel', 'Model');
/**
 * Search Model
 *
 * @property Post $Post
 * @property Page $Page
 */
class Search extends AppModel {

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
	public $useTable = 'search';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasOne = array('Site');
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
