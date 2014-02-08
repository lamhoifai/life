<?php
App::uses('Pokedex', 'Model');

/**
 * Pokedex Test Case
 *
 */
class PokedexTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokedex',
		'app.pokemon_type',
		'app.pokemon_skill',
		'app.pokemon_skill_category',
		'app.pokedex_pokemon_skill',
		'app.pokemon',
		'app.trainer',
		'app.user',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pokedex = ClassRegistry::init('Pokedex');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pokedex);

		parent::tearDown();
	}

}
