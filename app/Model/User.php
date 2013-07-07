<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';


	public $hasOne = array('Site');
	
	public $validate = array(
		'id' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
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


	public function sendNewPw($opts) {
    $email = new CakeEmail('default');
    $email->viewVars($opts);
    $email->template('new_pw', 'default')
      ->emailFormat('text')
      ->subject('New Password')
      ->from('myapp@app.com')
      ->to('chris@chris-shumate.com')
      ->send();
  }




}
