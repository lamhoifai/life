<?php
App::uses('AppModel', 'Model');
/**
 * PokemonType Model
 *
 * @property PokemonSkill $PokemonSkill
 */
class PokemonType extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokemon_type';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'PokemonSkill' => array(
			'className' => 'PokemonSkill',
			'foreignKey' => 'pokemon_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}