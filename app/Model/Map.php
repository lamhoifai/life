<?php
App::uses('AppModel', 'Model');
/**
 * Map Model
 *
 * @property Trainer $Trainer
 * @property Action $Action
 */
class Map extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Trainer' => array(
			'className' => 'Trainer',
			'foreignKey' => 'map_id',
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
		'Action' => array(
			'className' => 'Action',
			'joinTable' => 'maps_actions',
			'foreignKey' => 'map_id',
			'associationForeignKey' => 'action_id',
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