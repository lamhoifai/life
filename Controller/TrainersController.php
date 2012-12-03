<?php
App::uses('AppController', 'Controller');
/**
 * Trainers Controller
 *
 * @property Trainer $Trainer
 */
class TrainersController extends AppController {

	public function create() {
		if ($this->request->is('post')) {
			$this->request->data['Trainer']['user_id'] = $this->Session->read('Auth.User.id');
            $this->Trainer->create();
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The Game has been created'),'Flash/success');
				$this->redirect(array('controller' => 'games', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be created. Please, try again.'),'Flash/error');
			}
        }
	}
}
