<?php
App::uses('PokemonType', 'Model');

/**
 * PokemonType Test Case
 *
 */
class PokemonTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pokemon_type',
		'app.pokemon_skill',
		'app.pokemon_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PokemonType = ClassRegistry::init('PokemonType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PokemonType);

		parent::tearDown();
	}

}
