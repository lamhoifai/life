<?php
App::uses('AppModel', 'Model');
/**
 * Pokedex Model
 *
 * @property Pokemon $Pokemon
 * @property PokemonSkill $PokemonSkill
 * @property PokemonType $PokemonType
 */
class Pokedex extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokedex';

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
		'Pokemon' => array(
			'className' => 'Pokemon',
			'foreignKey' => 'pokedex_id',
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


	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'PokemonSkill' => array(
			'className' => 'PokemonSkill',
			'joinTable' => 'pokedex_pokemon_skill',
			'foreignKey' => 'pokedex_id',
			'associationForeignKey' => 'pokemon_skill_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'PokemonType' => array(
			'className' => 'PokemonType',
			'joinTable' => 'pokedex_pokemon_type',
			'foreignKey' => 'pokedex_id',
			'associationForeignKey' => 'pokemon_type_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}