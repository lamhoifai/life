<?php
/**
 * PokedexPokemonSkillFixture
 *
 */
class PokedexPokemonSkillFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokedex_pokemon_skill';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'pokedex_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pokemon_skill_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'req_lv' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'pokemon_skill_id' => 1,
			'req_lv' => 1,
			'created' => '2012-12-02 16:20:56',
			'modified' => '2012-12-02 16:20:56'
		),
	);

}
