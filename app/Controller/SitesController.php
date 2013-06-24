<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
 * @property Site $Site
 */
class SitesController extends AppController {


	public function admin_settings($id = null) {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Site->find('first');
		}
	}

}
