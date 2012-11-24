<?php
App::uses('AppController', 'Controller');

class EditoresController extends AppController {

	public $uses = array('Usuario','Proyecto','Publicacione','Categoria','Comentario','Colaboradore');

	public function beforeFilter() {    
		$this->layout = 'cpanel';     
		$this->Auth->allowedActions = array('*');
	}
	
	public function home(){
		$categorias = $this->Categoria->find('list');
		$this->set('proyectos', $this->Proyecto->find('all'));
		$this->set(compact('categorias'));
	}

	public function perfil(){
		$id_usuario = $this->Auth->user('id');
		$this->Usuario->id = $id_usuario;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('El usuario no es valido'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Usuario']['password'] = $this->request->data['Usuario']['password_new'];
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'home'));
			} 
			else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		else {
			$this->request->data = $this->Usuario->read(null, $id_usuario);
		}
		$paises = $this->Usuario->Paise->find('list');
		$this->set(compact('paises'));
		
	}

	//Proyectos

	public function proyectos() {
		$this->Proyecto->recursive = 0;
		$this->set('proyectos', $this->Proyecto->find('all'));
	}

	public function proyecto_view($id = null) {
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Invalid proyecto'));
		}		
		$proyecto = $this->Proyecto->read(null, $id);
		$id_usuario = $proyecto['Usuario']['id'];
		$this->Usuario->Behaviors->attach('Containable');
		$this->Usuario->contain('Paise');
		$this->Comentario->Behaviors->attach('Containable');
		$this->Comentario->contain('Usuario');
		$comentarios = $this->Comentario->find('all',
						array('conditions'=>array('Comentario.proyecto_id'=>$id)));
		$this->Colaboradore->Behaviors->attach('Containable');
		$this->Colaboradore->contain('Usuario');
		$colaboradores = $this->Colaboradore->find('all',
						array('conditions'=>array('Colaboradore.proyecto_id'=>$id)));
		$this->Colaboradore->recursive = -1;
		$colaboradordelproyecto =$this->Colaboradore->find('all',
						array('conditions'=>array('Colaboradore.proyecto_id'=>$id,'Colaboradore.usuario_id'=>$id_usuario)));

		$this->set('usuario',$this->Usuario->read(null,$id_usuario));
		$this->set(compact('proyecto', 'comentarios','colaboradores','colaboradordelproyecto'));
	}

	public function proyecto_add() {
		if ($this->request->is('post')) {
			$this->request->data['Proyecto']['fecha']=$this->fecha_hora();
			$this->request->data['Proyecto']['usuario_id']=$this->Auth->user('id');
			$this->Proyecto->create();
			if ($this->Proyecto->save($this->request->data)) {
				$this->Session->setFlash(__('The proyecto has been saved'));
				$this->redirect(array('action' => 'proyectos'));
			} else {
				$this->Session->setFlash(__('The proyecto could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Proyecto->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function proyecto_edit($id = null) {
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Invalid proyecto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proyecto->save($this->request->data)) {
				$this->Session->setFlash(__('The proyecto has been saved'));
				$this->redirect(array('action' => 'proyectos'));
			} 
			else {
				$this->Session->setFlash(__('The proyecto could not be saved. Please, try again.'));
			}
		} 
		else {
			$this->request->data = $this->Proyecto->read(null, $id);
		}
		
		$categorias = $this->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function proyecto_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Invalid proyecto'));
		}
		if ($this->Proyecto->delete()) {
			$this->Session->setFlash(__('Proyecto deleted'));
			$this->redirect(array('action' => 'proyectos'));
		}
		$this->Session->setFlash(__('Proyecto was not deleted'));
		$this->redirect(array('action' => 'proyectos'));
	}

	public function proyecto_colaborador($id_proyecto = null)
	{
		$this->request->data['Colaboradore']['fecha']=$this->fecha_hora();
		$this->request->data['Colaboradore']['usuario_id']=$this->Auth->user('id');
		$this->request->data['Colaboradore']['proyecto_id']=$id_proyecto;
		$this->Colaboradore->create();
		if ($this->Colaboradore->save($this->request->data)) {
			$this->Session->setFlash(__('Ya eres parte de este proyecto'));
			$this->redirect(array('action' => 'proyecto_view',$id_proyecto));
		} 
		else {
			$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
		}
		
	}

	public function detalle_usuario($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->Usuario->Behaviors->attach('Containable');
		$this->Usuario->contain('Proyecto','Paise');
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	/*********************Gestion de publicaciones ***********/
	public function publicaciones() {
		$this->Publicacione->recursive = 0;
		$this->set('publicaciones', $this->Publicacione->find('all'));
	}

	public function publicacion_view($id = null) {
		$this->Publicacione->id = $id;
		if (!$this->Publicacione->exists()) {
			throw new NotFoundException(__('Invalid publicacione'));
		}
		$this->set('publicacione', $this->Publicacione->read(null, $id));
	}

	public function publicacion_add() {
		if ($this->request->is('post')) {
			$this->request->data['Publicacione']['fecha']=$this->fecha_hora();
			$this->request->data['Publicacione']['usuario_id']=$this->Auth->user('id');
			$this->Publicacione->create();
			if ($this->Publicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The publicacione has been saved'));
				$this->redirect(array('action' => 'publicaciones'));
			} else {
				$this->Session->setFlash(__('The publicacione could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function publicacion_edit($id = null) {
		$this->Publicacione->id = $id;
		if (!$this->Publicacione->exists()) {
			throw new NotFoundException(__('Invalid publicacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Publicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The publicacione has been saved'));
				$this->redirect(array('action' => 'publicaciones'));
			} 
			else {
				$this->Session->setFlash(__('The publicacione could not be saved. Please, try again.'));
			}
		} 
		else {
			$this->request->data = $this->Publicacione->read(null, $id);
		}
		$categorias = $this->Publicacione->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function publicacion_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Publicacione->id = $id;
		if (!$this->Publicacione->exists()) {
			throw new NotFoundException(__('Invalid publicacione'));
		}
		if ($this->Publicacione->delete()) {
			$this->Session->setFlash(__('Publicacione deleted'));
			$this->redirect(array('action' => 'publicaciones'));
		}
		$this->Session->setFlash(__('Publicacione was not deleted'));
		$this->redirect(array('action' => 'publicaciones'));
	}

	/*********** gestion de colaboradores ******************/
	public function colaboradores() {
		$this->Colaboradore->recursive = 0;
		$this->set('colaboradores', $this->Colaboradore->find('all'));
	}

	/*********** gestion de comentarios ******************/
	public function comentarios() {
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->Comentario->find('all'));
	}

	public function comentario_add() {
		if ($this->request->is('post')) {
			$id_proyecto = $this->request->data['Comentario']['proyecto_id'];
			$this->request->data['Comentario']['fecha']=$this->fecha_hora();
			$this->request->data['Comentario']['usuario_id']=$this->Auth->user('id');
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('The comentario has been saved'));
				$this->redirect(array('action' => 'proyecto_view',$id_proyecto));
			} 
			else {
				$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
			}
		}
	}

	public function comentario_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		if ($this->Comentario->delete()) {
			$this->Session->setFlash(__('Comentario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comentario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}

?>	