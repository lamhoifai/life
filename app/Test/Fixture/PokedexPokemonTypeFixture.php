<?php
/**
 * PokedexPokemonTypeFixture
 *
 */
class PokedexPokemonTypeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokedex_pokemon_type';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'pokedex_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pokemon_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'pokedex_id' => 1,
			'pokemon_type_id' => 1
		),
	);

}
