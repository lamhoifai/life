<?php
App::uses('AppModel', 'Model');
/**
 * Action Model
 *
 * @property Map $Map
 */
class Action extends AppModel {

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'Map' => array(
			'className' => 'Map',
			'joinTable' => 'maps_actions',
			'foreignKey' => 'action_id',
			'associationForeignKey' => 'map_id',
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