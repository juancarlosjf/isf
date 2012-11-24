<?php
App::uses('AppModel', 'Model');

class Comentario extends AppModel {

	public $belongsTo = array(
		'Publicacione' => array(
			'className' => 'Publicacione',
			'foreignKey' => 'publicacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proyecto' => array(
			'className' => 'Proyecto',
			'foreignKey' => 'proyecto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
