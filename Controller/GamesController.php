<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class GamesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Games';

	public $components = array('AjaxHandler');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Trainer','Pokedex');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->AjaxHandler->handle('set_inital_pokemon');
	}


	public function index() {
		
	}
	
	public function create() {
		$conditions = array('Trainer.user_id' => $this->Session->read('Auth.User.id'));
		$trainer = $this->Trainer->find('first', compact('conditions'));
		if($trainer) {
			$this->Session->setFlash(__('You have already got a Trainer.'),'Flash/error');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function handle_ajax() {
		$response = array('success' => false, 'data' => array());
		header('Content-Type: application/json');
		$target = $this->request->data['target'];
		$request_type = $this->request->data['request_type'];
		
		
		if ($request_type == 'modal') {
			$response['success'] = true;
			$response['data']['type'] = 'modal';
			$view = new View($this,false);
			if ($this->request->data['params']) {
				$param = split('=', $this->request->data['params']);
				$pokemon = null;
				if ($param[0] == 'pokemon') {
					$conditions = array('Pokedex.id' => $param[1]);
					$pokemon = $this->Pokedex->find('first', compact('conditions'));
				}
				$response['data']['content'] = $view->element('/games/modal/'.$target, array($param[0]=>$pokemon));
			} else {
				$response['data']['content'] = $view->element('/games/modal/'.$target);
			}
			
		}
		
		return $this->AjaxHandler->respond('json', $response);
	}
	
	public function set_inital_pokemon($name) {
		$conditions = array('Pokedex.name' => $name);
		$pokedex = $this->find('first', compact('conditions'));
		$data['Pokemon']['name'] = $pokedex['Pokedex']['name'];
		$data['Pokemon']['pokedex_id'] = $pokedex['Pokedex']['id'];
		$data['Pokemon']['trainer_id'] = $this->Session->read('Auth.User.id');
		$data['Pokemon']['level'] = 5;
		$data['Pokemon']['min_hp'] = $pokedex['Pokedex']['hp'];
		$data['Pokemon']['max_hp'] = $pokedex['Pokedex']['hp'];
		//skill
		//$data['Pokemon']['name'] = $pokedex['Pokedex']['name'];
	}
}
