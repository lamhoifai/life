<?php
App::uses('PokedexPokemonType', 'Model');

/**
 * PokedexPokemonType Test Case
 *
 */
class PokedexPokemonTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokedex_pokemon_type',
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
		$this->PokedexPokemonType = ClassRegistry::init('PokedexPokemonType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokedexPokemonType);

		parent::tearDown();
	}

}
