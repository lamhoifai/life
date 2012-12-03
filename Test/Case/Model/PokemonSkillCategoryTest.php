<?php
App::uses('PokemonSkillCategory', 'Model');

/**
 * PokemonSkillCategory Test Case
 *
 */
class PokemonSkillCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokemon_skill_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PokemonSkillCategory = ClassRegistry::init('PokemonSkillCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokemonSkillCategory);

		parent::tearDown();
	}

}
