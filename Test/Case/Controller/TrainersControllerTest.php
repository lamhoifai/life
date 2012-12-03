<?php
App::uses('TrainersController', 'Controller');

/**
 * TrainersController Test Case
 *
 */
class TrainersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trainer',
		'app.user',
		'app.role',
		'app.pokemon',
		'app.pokedex',
		'app.pokemon_type',
		'app.pokemon_skill',
		'app.pokemon_skill_category'
	);

}
