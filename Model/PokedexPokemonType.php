<?php
App::uses('AppModel', 'Model');
/**
 * PokedexPokemonType Model
 *
 * @property Pokedex $Pokedex
 * @property PokemonType $PokemonType
 */
class PokedexPokemonType extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokedex_pokemon_type';

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
		'PokemonType' => array(
			'className' => 'PokemonType',
			'foreignKey' => 'pokemon_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}