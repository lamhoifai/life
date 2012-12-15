<?php
App::uses('MapsAction', 'Model');

/**
 * MapsAction Test Case
 *
 */
class MapsActionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maps_action',
		'app.map',
		'app.trainer',
		'app.user',
		'app.role',
		'app.pokemon',
		'app.pokedex',
		'app.pokemon_skill',
		'app.pokemon_type',
		'app.pokemon_skill_category',
		'app.pokedex_pokemon_skill',
		'app.pokedex_pokemon_type',
		'app.pokemon_pokemon_skill',
		'app.action'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapsAction = ClassRegistry::init('MapsAction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapsAction);

		parent::tearDown();
	}

}
