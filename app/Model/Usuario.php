<?php
App::uses('AppModel', 'Model');

class Usuario extends AppModel {

	public $displayField = 'full_nombre';

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	public $belongsTo = array('Paise','Tipousuario');

	public $hasMany = array('Colaboradore','Comentario','Proyecto','Publicacione');

}

?>
