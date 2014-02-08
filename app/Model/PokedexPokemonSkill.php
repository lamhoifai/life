<?php
App::uses('AppModel', 'Model');
/**
 * PokedexPokemonSkill Model
 *
 * @property Pokedex $Pokedex
 * @property PokemonSkill $PokemonSkill
 */
class PokedexPokemonSkill extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokedex_pokemon_skill';

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
		'PokemonSkill' => array(
			'className' => 'PokemonSkill',
			'foreignKey' => 'pokemon_skill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}