<?php
App::uses('AppModel', 'Model');
/**
 * PokemonPokemonSkill Model
 *
 * @property Pokemon $Pokemon
 * @property PokemonSkill $PokemonSkill
 */
class PokemonPokemonSkill extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokemon_pokemon_skill';

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Pokemon' => array(
			'className' => 'Pokemon',
			'foreignKey' => 'pokemon_id',
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