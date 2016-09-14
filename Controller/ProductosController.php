<?php
App::uses('AppController', 'Controller');
class ProductosController extends AppController
{
	public function index()
	{
		/**
		 * Opciones de paginacion
		 */
		$paginate		= array(
			'contain'		=> array(
				'Version'		=> array(
					'Modelo'		=> array(
						'fields'		=> array(
							'Modelo.nombre', 'Modelo.slug'
						)
					),
					'fields'		=> array(
						'Version.nombre', 'Version.modelo_version', 'Version.slug'
					)
				)
			)
		);

		/**
		 * Verifica si el listado de productos esta condicionado por categoria
		 */
		if ( ! empty($this->request->params['slug']) )
		{
			/**
			 * Verifica que la categoria exista y tenga productos
			 */
			$categoria			= $this->Producto->Categoria->find('first', array(
				'conditions'		=> array(
					'Categoria.slug'						=> $this->request->params['slug'],
					'Categoria.producto_activo_count >'		=> 0
				)
			));
			if ( ! $categoria )
			{
				$this->redirect('/');
			}

			/**
			 * Agrega el filtro de categoria a la paginacion
			 */
			$paginate		= array_replace_recursive($paginate, array(
				'contain'		=> array(
					'Categoria'		=> array(
						'fields'		=> array(
							'Categoria.nombre', 'Categoria.slug', 'Categoria.imagen',
							'Categoria.producto_activo_count', 'Categoria.producto_inactivo_count',
						),
						'conditions'	=> array('Categoria.id' => $categoria['Categoria']['id'])
					)
				)
			));
		}

		$this->paginate		= $paginate;
		$productos			= $this->paginate();
		$this->set(compact('categoria', 'productos'));
	}

	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0,
			'contain'		=> array('Categoria', 'Version')
		);
		$productos	= $this->paginate();
		$this->set(compact('productos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Producto->create();
			if ( $this->Producto->saveAll($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$administradores	= $this->Producto->Administrador->find('list');
		$categorias	= $this->Producto->Categoria->find('list');
		$versiones	= $this->Producto->Version->find('list');
		$this->set(compact('administradores', 'categorias', 'versiones'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Producto->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Producto->saveAll($this->request->data) )
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
			$this->request->data	= $this->Producto->find('first', array(
				'conditions'	=> array('Producto.id' => $id),
				'contain'		=> array('Categoria', 'Version')
			));
		}
		$administradores	= $this->Producto->Administrador->find('list');
		$categorias	= $this->Producto->Categoria->find('list');
		$versiones	= $this->Producto->Version->find('list');
		$this->set(compact('administradores', 'categorias', 'versiones'));
	}

	public function admin_delete($id = null)
	{
		$this->Producto->id = $id;
		if ( ! $this->Producto->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Producto->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Producto->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Producto->_schema);
		$modelo			= $this->Producto->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	public function admin_activar($id = null)
	{
		$this->Producto->id = $id;
		if ( ! $this->Producto->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Producto->saveField('activo', true) )
		{
			$this->Session->setFlash('Registro activado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al activar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_desactivar($id = null)
	{
		$this->Producto->id = $id;
		if ( ! $this->Producto->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Producto->saveField('activo', false) )
		{
			$this->Session->setFlash('Registro desactivado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al desactivar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
}
