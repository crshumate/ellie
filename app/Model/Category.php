<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 */
class Category extends AppModel {
	public $hasMany=array('Post');
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'wb';

}
