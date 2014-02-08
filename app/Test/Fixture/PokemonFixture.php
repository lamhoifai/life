<?php
/**
 * PokemonFixture
 *
 */
class PokemonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokemon';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pokedex_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'trainer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'level' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'min_hp' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'max_hp' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'exp_min' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'exp_max' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'attack' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'defense' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'special_attack' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'special_defense' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'speed' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'pokedex_id' => 1,
			'trainer_id' => 1,
			'level' => 1,
			'min_hp' => 1,
			'max_hp' => 1,
			'exp_min' => 1,
			'exp_max' => 1,
			'attack' => 1,
			'defense' => 1,
			'special_attack' => 1,
			'special_defense' => 1,
			'speed' => 1,
			'created' => '2012-12-02 17:58:39',
			'modified' => '2012-12-02 17:58:39'
		),
	);

}
