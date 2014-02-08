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
	public $uses = array(
		'Pokedex',
		'PokemonType',
		'PokemonSkillCategory',
		'PokedexPokemonSkill',
		'PokedexPokemonType',
		'PokemonSkill',
		'Pokemon',
		'Trainer',
		'PokemonPokemonSkill'
	);
	
	/**
     * AJAX Response
     *
     * @var
     */
    public $result = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->AjaxHandler->handle('handle_ajax');
		$this->result = array('success' => false, 'data' => array());
	}


	public function index() {
		$this->Trainer->recursive = 2;
		$conditions = array('Trainer.user_id' => $this->currentUser['User']['id']);
		$data = $this->Trainer->find('first', compact('conditions'));
		if($data['Trainer']['is_battle']) {
			$this->redirect(array('controller' => 'battle'));
		}
		$this->set(compact('data'));
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
		
		header('Content-Type: application/json');
		$target = $this->request->data['target'];
		$request_type = $this->request->data['request_type'];
		
		
		switch ($request_type) {
			case 'modal':
				$this->result['success'] = true;
				$this->result['data']['type'] = 'modal';
				$view = new View($this,false);
				$this->result['data']['content'] = $view->element('/games/modal/'.$target);
				break;
			case 'inital_pokemon':
				$this->__set_inital_pokemon($target);
				break;
			
		}
		
		return $this->AjaxHandler->respond('json', $this->result);
	}
	
	protected function __set_inital_pokemon($name) {
		//need to check if the trainer don't have pokemon before
		$conditions = array('Trainer.user_id' => $this->currentUser['User']['id']);
		$trainer = $this->Trainer->find('first', compact('conditions'));
		$conditions = array('Pokemon.trainer_id' => $trainer['Trainer']['id']);
		$count = $this->Pokemon->find('count', compact('conditions'));
		if ($count > 0) {
			$this->result['success'] = false;
			$this->result['data']['message'] = __('You have already got a Pokemon!');
			return;
		}

		$conditions = array('Pokedex.name' => $name);
		$this->Pokedex->recursive = 0;
		$pokedex = $this->Pokedex->find('first', compact('conditions'));
		$data['Pokemon']['name'] = $pokedex['Pokedex']['name'];
		$data['Pokemon']['pokedex_id'] = $pokedex['Pokedex']['id'];
		$data['Pokemon']['attack'] = $pokedex['Pokedex']['attack'];
		$data['Pokemon']['defense'] = $pokedex['Pokedex']['defense'];
		$data['Pokemon']['special_attack'] = $pokedex['Pokedex']['special_attack'];
		$data['Pokemon']['special_defense'] = $pokedex['Pokedex']['special_defense'];
		$data['Pokemon']['speed'] = $pokedex['Pokedex']['speed'];
		$data['Pokemon']['trainer_id'] = $trainer['Trainer']['id'];
		$data['Pokemon']['level'] = 5;
		$data['Pokemon']['min_hp'] = $pokedex['Pokedex']['hp'];
		$data['Pokemon']['max_hp'] = $pokedex['Pokedex']['hp'];
		$data['Pokemon']['exp_min'] = 0;
		$data['Pokemon']['exp_max'] = 100;
		
		$conditions = array(
			'PokedexPokemonSkill.pokedex_id' => 1,
			'PokedexPokemonSkill.req_lv <=' => 5
		);
		$this->PokedexPokemonSkill->recursive = 1;
		$skills = $this->PokedexPokemonSkill->find('all', compact('conditions'));
		$data['PokemonSkill'] = array();
		$i = 0;
		foreach ($skills as $skill) {
			$data['PokemonSkill'][$i] = array();
			$data['PokemonSkill'][$i]['pokemon_skill_id'] = $skill['PokedexPokemonSkill']['pokemon_skill_id'];
			$data['PokemonSkill'][$i]['skill_min_pp'] = $skill['PokemonSkill']['pp'];
			$data['PokemonSkill'][$i]['skill_max_pp'] = $skill['PokemonSkill']['pp'];
			$i++;
		}
		$this->Pokemon->saveAssociated($data);
		$this->result['success'] = true;
		$this->result['data']['type'] = 'modal-change';
		$view = new View($this,false);
		$this->result['data']['content'] = $view->element('/games/modal/oak_lab2', compact('name'));
	}
}
