<?php
App::uses('AppController', 'Controller');
class ConcesionariosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$concesionarios	= $this->paginate();
		$this->set(compact('concesionarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Concesionario->create();
			if ( $this->Concesionario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$comunas	= $this->Concesionario->Comuna->find('list');
		$administradores	= $this->Concesionario->Administrador->find('list');
		$this->set(compact('comunas', 'administradores'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Concesionario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Concesionario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Concesionario->find('first', array(
				'conditions'	=> array('Concesionario.id' => $id)
			));
		}
		$comunas	= $this->Concesionario->Comuna->find('list');
		$administradores	= $this->Concesionario->Administrador->find('list');
		$this->set(compact('comunas', 'administradores'));
	}

	public function admin_delete($id = null)
	{
		$this->Concesionario->id = $id;
		if ( ! $this->Concesionario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Concesionario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Concesionario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Concesionario->_schema);
		$modelo			= $this->Concesionario->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	public function admin_activar($id = null)
	{
		$this->Concesionario->id = $id;
		if ( ! $this->Concesionario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Concesionario->saveField('activo', true) )
		{
			$this->Session->setFlash('Registro activado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al activar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_desactivar($id = null)
	{
		$this->Concesionario->id = $id;
		if ( ! $this->Concesionario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Concesionario->saveField('activo', false) )
		{
			$this->Session->setFlash('Registro desactivado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al desactivar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
}
