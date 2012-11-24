<?php
App::uses('AppModel', 'Model');

class Paise extends AppModel {

	public $displayField = 'nombre_pais';

	public $hasMany = array('Usuario');

}
?>
