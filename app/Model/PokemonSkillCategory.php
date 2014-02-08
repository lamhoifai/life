<?php
App::uses('AppModel', 'Model');
/**
 * PokemonSkillCategory Model
 *
 */
class PokemonSkillCategory extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'pokemon_skill_category';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';
}