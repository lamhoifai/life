<?php
App::uses('PokemonPokemonSkill', 'Model');

/**
 * PokemonPokemonSkill Test Case
 *
 */
class PokemonPokemonSkillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokemon_pokemon_skill',
		'app.pokemon',
		'app.pokedex',
		'app.pokemon_skill',
		'app.pokemon_type',
		'app.pokemon_skill_category',
		'app.pokedex_pokemon_skill',
		'app.pokedex_pokemon_type',
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
		$this->PokemonPokemonSkill = ClassRegistry::init('PokemonPokemonSkill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokemonPokemonSkill);

		parent::tearDown();
	}

}
