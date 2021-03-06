<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Security'=>array(
		'csrfUseOnce' => false,
		
	),
	'Session',
	'Auth'=>array(
		'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard'),
		'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin'=>false)/*,
		'authorize'=>array('Controller')*/
	)
	
	);
	public $helpers = array('Html', 'Form', 'Session');
	
	public function beforeFilter(){
	$this->set('storyId', CakeSession::read('storyId'));
	
	$user=$this->Auth->user();
	$this->set('user', $user);
	if($this->params['admin'] && $user['role_id']!=1){
		$this->Session->setFlash('You do not have sufficient privileges for this operation.');
		$this->redirect(array('controller'=>'posts', 'action'=>'index', 'admin'=>false));
	}
	}
	
}
