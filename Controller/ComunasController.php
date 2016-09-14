<?php
App::uses('AppController', 'Controller');
class ComunasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$comunas	= $this->paginate();
		$this->set(compact('comunas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Comuna->create();
			if ( $this->Comuna->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$regiones	= $this->Comuna->Region->find('list');
		$this->set(compact('regiones'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Comuna->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Comuna->save($this->request->data) )
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
			$this->request->data	= $this->Comuna->find('first', array(
				'conditions'	=> array('Comuna.id' => $id)
			));
		}
		$regiones	= $this->Comuna->Region->find('list');
		$this->set(compact('regiones'));
	}

	public function admin_delete($id = null)
	{
		$this->Comuna->id = $id;
		if ( ! $this->Comuna->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Comuna->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Comuna->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Comuna->_schema);
		$modelo			= $this->Comuna->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
