<?php
/**
 * PokedexFixture
 *
 */
class PokedexFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokedex';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hp' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
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
			'ref' => 'Lorem ipsum dolor sit amet',
			'hp' => 1,
			'attack' => 1,
			'defense' => 1,
			'special_attack' => 1,
			'special_defense' => 1,
			'speed' => 1,
			'created' => '2012-12-02 16:59:54',
			'modified' => '2012-12-02 16:59:54'
		),
	);

}
