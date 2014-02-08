<?php
App::uses('Pokemon', 'Model');

/**
 * Pokemon Test Case
 *
 */
class PokemonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokemon',
		'app.pokedex',
		'app.pokemon_skill',
		'app.pokemon_type',
		'app.pokemon_skill_category',
		'app.pokedex_pokemon_skill',
		'app.pokedex_pokemon_type',
		'app.trainer',
		'app.user',
		'app.role',
		'app.pokemon_pokemon_skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pokemon = ClassRegistry::init('Pokemon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pokemon);

		parent::tearDown();
	}

}
