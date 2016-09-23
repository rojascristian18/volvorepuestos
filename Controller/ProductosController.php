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
				'Categoria'		=> array(
					'fields'		=> array(
						'Categoria.nombre', 'Categoria.slug', 'Categoria.imagen',
						'Categoria.producto_activo_count', 'Categoria.producto_inactivo_count',
					)
				),
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


		BreadcrumbComponent::add('Catálogo ');


		// Filtrado de productos por formulario
		if ( $this->request->is('post') ) {

			/**
			* Lista los productos por categoria y modelo
			*/
			if ( ! empty($this->request->data['Producto']['categoria_slug']) && ! empty($this->request->data['Producto']['modelo_slug']) ) {

				$this->redirect(array('controller' => 'productos', 'action' => 'index', 'slug' => $this->request->data['Producto']['categoria_slug'], 'model' => $this->request->data['Producto']['modelo_slug']));
				
			}
					
			/**
			* Lista los productos por categoría
			*/
			if ( ! empty($this->request->data['Producto']['categoria_slug']) ) {

				$this->redirect(array('controller' => 'productos', 'action' => 'index', 'slug' => $this->request->data['Producto']['categoria_slug']));

			}

			/**
			* Busqueda
			*/
			if ( ! empty($this->request->data['Producto']['nombre_buscar']) ) {

				$this->redirect(array('controller' => 'productos', 'action' => 'index', 'srch' => $this->request->data['Producto']['nombre_buscar']));

			}


		} else {

			/**
			* Filtro por categoria listando todos los productos
			*/
			if ( ! empty($this->request->params['slug']) ) {

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
					),
					'joins'		=> array( 
							array(
					            'table' => 'categorias_productos',
					            'alias' => 'CategoriasProductos',
					            'type'  => 'INNER',
					            'conditions' => array(
					                'CategoriasProductos.producto_id = Producto.id',
					                'CategoriasProductos.categoria_id' => $categoria['Categoria']['id']
					            )

				        	)
					)
				));
			}


			/**
			* Filtro por categoría y modelo los productos
			*/
			if ( ! empty($this->request->params['slug']) && ! empty($this->request->params['model']) ) {

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
				* Verifica que el modelo exista
				*/
				$modelo = ClassRegistry::init('Modelo')->find('first', array(
					'conditions' => array('Modelo.slug' => $this->request->params['model'], 'Modelo.producto_activo_count >'	=> 0),
					'fields'	=> array('id')
				));
				if ( ! $modelo )
				{
					$this->redirect('/');
				}

				
				/**
				 * Verifica que las versión exista y tenga productos
				 */
				$versiones			= $this->Producto->Version->find('all', array(
					'conditions'		=> array(
						'Version.modelo_id'						=> $modelo['Modelo']['id'],
						'Version.producto_activo_count >'		=> 0
					)
				));
				if ( ! $versiones )
				{
					$this->redirect('/');
				}
				
				$arrayVersiones = array();


				/**
				* Arma el arreglo con ids de versiones del modelo consultado
				*/
				foreach ($versiones as $version) {
					$arrayVersiones[] = $version['Version']['id'];
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
						),
						'Version'		=> array(
							'Modelo'		=> array(
								'fields'		=> array(
									'Modelo.nombre', 'Modelo.slug'
								),
							),
							'fields'		=> array(
								'Version.nombre', 'Version.modelo_version', 'Version.slug'
							)
						)
					),
					'joins'		=> array(
						array(
				            'table' => 'categorias_productos',
				            'alias' => 'CategoriasProductos',
				            'type'  => 'INNER',
				            'conditions' => array(
				                'CategoriasProductos.producto_id = Producto.id',
				                'CategoriasProductos.categoria_id' => $categoria['Categoria']['id']
				            )

			        	),
			        	array(
				            'table' => 'versiones_productos',
				            'alias' => 'VersionesProductos',
				            'type'  => 'INNER',
				            'conditions' => array(
				                'VersionesProductos.producto_id = Producto.id',
				                'VersionesProductos.version_id' => $arrayVersiones
				            )

			        	)
					)
				));
			}


			/**
			* Ordenar productos dependiendo de la categoría que se está vizualizando
			*/
			if ( ! empty($this->request->params['named']['slug']) ) {

				BreadcrumbComponent::add('<i class="fa fa-angle-right" ></i> ' . $this->request->params['named']['slug']);

				/**
				 * Verifica que la categoria exista y tenga productos
				 */
				$categoria			= $this->Producto->Categoria->find('first', array(
					'conditions'		=> array(
						'Categoria.slug'						=> $this->request->params['named']['slug'],
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
					),
					'joins'		=> array( 
							array(
					            'table' => 'categorias_productos',
					            'alias' => 'CategoriasProductos',
					            'type'  => 'INNER',
					            'conditions' => array(
					                'CategoriasProductos.producto_id = Producto.id',
					                'CategoriasProductos.categoria_id' => $categoria['Categoria']['id']
					            )

				        	)
					)
				));
			}


			/**
			 * Ordenar productos dependiendo de la categoría y modelo que se está vizualizando
			 */
			if ( ! empty($this->request->params['named']['slug']) && ! empty($this->request->params['named']['model']) ) {	

				BreadcrumbComponent::add('<i class="fa fa-angle-right" ></i> ' . $this->request->params['named']['model']);
				
				/**
				 * Verifica que la categoria exista y tenga productos
				 */
				$categoria			= $this->Producto->Categoria->find('first', array(
					'conditions'		=> array(
						'Categoria.slug'						=> $this->request->params['named']['slug'],
						'Categoria.producto_activo_count >'		=> 0
					)
				));
				if ( ! $categoria )
				{
					$this->redirect('/');
				}


				/**
				* Verifica que el modelo exista
				*/
				$modelo = ClassRegistry::init('Modelo')->find('first', array(
					'conditions' => array('Modelo.slug' => $this->request->params['named']['model'], 'Modelo.producto_activo_count >'	=> 0),
					'fields'	=> array('id')
				));
				if ( ! $modelo )
				{
					$this->redirect('/');
				}

				
				/**
				 * Verifica que las versión exista y tenga productos
				 */
				$versiones			= $this->Producto->Version->find('all', array(
					'conditions'		=> array(
						'Version.modelo_id'						=> $modelo['Modelo']['id'],
						'Version.producto_activo_count >'		=> 0
					)
				));
				if ( ! $versiones )
				{
					$this->redirect('/');
				}
				
				$arrayVersiones = array();


				/**
				* Arma el arreglo con ids de versiones del modelo consultado
				*/
				foreach ($versiones as $version) {
					$arrayVersiones[] = $version['Version']['id'];
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
						),
						'Version'		=> array(
							'Modelo'		=> array(
								'fields'		=> array(
									'Modelo.nombre', 'Modelo.slug'
								),
							),
							'fields'		=> array(
								'Version.nombre', 'Version.modelo_version', 'Version.slug'
							)
						)
					),
					'joins'		=> array(
						array(
				            'table' => 'categorias_productos',
				            'alias' => 'CategoriasProductos',
				            'type'  => 'INNER',
				            'conditions' => array(
				                'CategoriasProductos.producto_id = Producto.id',
				                'CategoriasProductos.categoria_id' => $categoria['Categoria']['id']
				            )

			        	),
			        	array(
				            'table' => 'versiones_productos',
				            'alias' => 'VersionesProductos',
				            'type'  => 'INNER',
				            'conditions' => array(
				                'VersionesProductos.producto_id = Producto.id',
				                'VersionesProductos.version_id' => $arrayVersiones
				            )

			        	)
					)
				));
			}


			/**
			* Busqueda de productos
			*/
			if ( ! empty($this->request->params['srch']) ) {
				
				$searchResult = $this->Producto->find('all', array(
					'conditions'	=> array('Producto.nombre LIKE "%' . $this->request->params['srch'] . '%"'),
					'fields'		=> array('Producto.id')
					)
				);

				if (empty($searchResult)) {

					$this->Session->setFlash('No se encontraron resultados para "' . $this->request->params['srch'] . '"' , 'alertas', array(), 'danger');

					$paginate	=  array();

				}else{

					$searchResultIds = array();

					foreach ($searchResult as $product) {
						$searchResultIds[] = $product['Producto']['id'];
					}
					
					$paginate		= array_replace_recursive($paginate, array(
						'conditions'	=> array('Producto.id IN ' => $searchResultIds),
						'contain'		=> array(
							'Categoria'		=> array(
								'fields'		=> array(
									'Categoria.nombre', 'Categoria.slug', 'Categoria.imagen',
									'Categoria.producto_activo_count', 'Categoria.producto_inactivo_count',
								)
							),
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
					));

					$this->Session->setFlash( count($searchResult) . ' resultados encontrados para "' . $this->request->params['srch'] . '"' , 'alertas', array(), 'success');

				}
			}


			/**
			* Orden de productos al buscar
			*/
			if ( ! empty($this->request->params['named']['srch']) ) {

				BreadcrumbComponent::add('<i class="fa fa-angle-right" ></i> Búsqueda "' . $this->request->params['named']['srch'] .'"');
				
				$searchResult = $this->Producto->find('all', array(
					'conditions'	=> array('Producto.nombre LIKE "%' . $this->request->params['named']['srch'] . '%"'),
					'fields'		=> array('Producto.id')
					)
				);

				if (empty($searchResult)) {

					$this->Session->setFlash('No se encontraron resultados para "' . $this->request->params['named']['srch'] . '"' , null, array(), 'danger');

					$paginate	= array();

				}else{

					$searchResultIds = array();

					foreach ($searchResult as $product) {
						$searchResultIds[] = $product['Producto']['id'];
					}
					
					$paginate		= array_replace_recursive($paginate, array(
						'conditions'	=> array('Producto.id IN ' => $searchResultIds),
						'contain'		=> array(
							'Categoria'		=> array(
								'fields'		=> array(
									'Categoria.nombre', 'Categoria.slug', 'Categoria.imagen',
									'Categoria.producto_activo_count', 'Categoria.producto_inactivo_count',
								)
							),
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
					));

					$this->Session->setFlash( count($searchResult) . ' resultados encontrados para "' . $this->request->params['named']['srch'] . '"' , null, array(), 'success');

				}
			}
		}

		// Banners
		$ListaBanners = $this->getHero('repuestos');

		if ( !empty($paginate) ) {
			$this->paginate		= $paginate;
			$productos			= $this->paginate();
		
			$this->set(compact('categoria', 'productos', 'ListaBanners'));
		}else{
			$productos			= array();
		
			$this->set(compact('categoria', 'productos', 'ListaBanners'));
		}
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
