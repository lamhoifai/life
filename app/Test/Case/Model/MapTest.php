<?php
App::uses('Map', 'Model');

/**
 * Map Test Case
 *
 */
class MapTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.action',
		'app.maps_action'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Map = ClassRegistry::init('Map');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Map);

		parent::tearDown();
	}

}
