<?php
App::uses('PokemonSkill', 'Model');

/**
 * PokemonSkill Test Case
 *
 */
class PokemonSkillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokemon_skill',
		'app.pokemon_type',
		'app.pokemon_skill_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PokemonSkill = ClassRegistry::init('PokemonSkill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokemonSkill);

		parent::tearDown();
	}

}
