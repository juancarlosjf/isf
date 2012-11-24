<?php
App::uses('AppModel', 'Model');

class Categoria extends AppModel {

	public $displayField = 'categoria';

	public $hasMany = array(
		'Proyecto' => array(
			'className' => 'Proyecto',
			'foreignKey' => 'categoria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Publicacione' => array(
			'className' => 'Publicacione',
			'foreignKey' => 'categoria_id',
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

?>
