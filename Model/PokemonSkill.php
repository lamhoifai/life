<?php
App::uses('AppModel', 'Model');
/**
 * PokemonSkill Model
 *
 * @property PokemonType $PokemonType
 * @property PokemonSkillCategory $PokemonSkillCategory
 * @property Pokedex $Pokedex
 */
class PokemonSkill extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokemon_skill';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'PokemonType' => array(
			'className' => 'PokemonType',
			'foreignKey' => 'pokemon_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PokemonSkillCategory' => array(
			'className' => 'PokemonSkillCategory',
			'foreignKey' => 'pokemon_skill_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'Pokedex' => array(
			'className' => 'Pokedex',
			'joinTable' => 'pokedex_pokemon_skill',
			'foreignKey' => 'pokemon_skill_id',
			'associationForeignKey' => 'pokedex_id',
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