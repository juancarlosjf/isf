<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

	public function beforeFilter() {    
		$this->layout = 'cpanel';     
		$this->Auth->allowedActions = array('*');
	}

	public function login(){
		$this->layout = 'login';
		if($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			}else{
				$this->Session->setFlash('Email o contraseña incorrecta');
			}
		}
	}

	public function logout() {
 	   $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Usuario->find('all'));
	}

	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	public function registro() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$this->Usuario->create();
			$this->request->data['Usuario']['fecha_registro'] = $this->fecha_hora();
			$this->request->data['Usuario']['tipousuario_id'] = 2;
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		$paises = $this->Usuario->Paise->find('list');
		$tipousuarios = $this->Usuario->Tipousuario->find('list');
		$this->set(compact('paises', 'tipousuarios'));
	}

	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
		}
		$paises = $this->Usuario->Paise->find('list');
		$tipousuarios = $this->Usuario->Tipousuario->find('list');
		$this->set(compact('paises', 'tipousuarios'));
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

?>
