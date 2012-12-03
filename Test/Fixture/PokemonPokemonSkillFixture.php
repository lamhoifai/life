<?php
/**
 * PokemonPokemonSkillFixture
 *
 */
class PokemonPokemonSkillFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokemon_pokemon_skill';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'pokemon_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pokemon_skill_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'skill_min_pp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'skill_max_pp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'pokemon_id' => 1,
			'pokemon_skill_id' => 1,
			'skill_min_pp' => 1,
			'skill_max_pp' => 1,
			'created' => '2012-12-02 18:00:05',
			'modified' => '2012-12-02 18:00:05'
		),
	);

}
