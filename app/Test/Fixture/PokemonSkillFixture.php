<?php
/**
 * PokemonSkillFixture
 *
 */
class PokemonSkillFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pokemon_skill';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pokemon_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'pokemon_skill_category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'power' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'accuracy' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'pp' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'pokemon_type_id' => 1,
			'pokemon_skill_category_id' => 1,
			'power' => 1,
			'accuracy' => 1,
			'pp' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-12-02 03:46:07',
			'modified' => '2012-12-02 03:46:07'
		),
	);

}
