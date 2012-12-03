<?php
App::uses('PokedexPokemonSkill', 'Model');

/**
 * PokedexPokemonSkill Test Case
 *
 */
class PokedexPokemonSkillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokedex_pokemon_skill',
		'app.pokedex',
		'app.pokemon_type',
		'app.pokemon_skill',
		'app.pokemon_skill_category',
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
		$this->PokedexPokemonSkill = ClassRegistry::init('PokedexPokemonSkill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokedexPokemonSkill);

		parent::tearDown();
	}

}
