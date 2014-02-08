<?php
App::uses('Trainer', 'Model');

/**
 * Trainer Test Case
 *
 */
class TrainerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trainer',
		'app.user',
		'app.role',
		'app.map',
		'app.pokemon',
		'app.pokedex',
		'app.pokemon_skill',
		'app.pokemon_type',
		'app.pokemon_skill_category',
		'app.pokedex_pokemon_skill',
		'app.pokedex_pokemon_type',
		'app.pokemon_pokemon_skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trainer = ClassRegistry::init('Trainer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trainer);

		parent::tearDown();
	}

}
