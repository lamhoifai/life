<?php
App::uses('AppModel', 'Model');
/**
 * Pokemon Model
 *
 * @property Pokedex $Pokedex
 * @property Trainer $Trainer
 * @property PokemonSkill $PokemonSkill
 * @property PokemonType $PokemonType
 * @property PokemonSkill $PokemonSkill
 */
class Pokemon extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokemon';

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
		'Pokedex' => array(
			'className' => 'Pokedex',
			'foreignKey' => 'pokedex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Trainer' => array(
			'className' => 'Trainer',
			'foreignKey' => 'trainer_id',
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
		'PokemonSkill' => array(
			'className' => 'PokemonSkill',
			'joinTable' => 'pokemon_pokemon_skill',
			'foreignKey' => 'pokemon_id',
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
		)
	);

}