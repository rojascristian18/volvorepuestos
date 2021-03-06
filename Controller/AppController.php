<?php
App::uses('Controller', 'Controller');
//App::uses('FB', 'Facebook.Lib');
class AppController extends Controller
{
	public $helpers		= array(
		'Session', 'Html', 'Form', 'PhpExcel', 'Number'
		//, 'Facebook.Facebook'
	);
	public $components	= array(
		'Session',
		'Auth'		=> array(
			'loginAction'		=> array('controller' => 'administradores', 'action' => 'login', 'admin' => true),
			'loginRedirect'		=> '/admin',
			'logoutRedirect'	=> '/admin',
			'authError'			=> 'No tienes permisos para entrar a esta sección.',
			'authenticate'		=> array(
				'Form'				=> array(
					'userModel'			=> 'Usuario',
					'fields'			=> array(
						'username'			=> 'email',
						'password'			=> 'clave'
					)
				)
			)
		),
		'DebugKit.Toolbar',
		'Carro',
		'Breadcrumb' => array(
			'crumbs'		=> array(
				array('', null),
				array('Inicio', '/'),
				array('<i class="fa fa-angle-right" ></i>', null),
			)
		)
		//'Facebook.Connect'	=> array('model' => 'Usuario'),
		//'Facebook'
	);

	public function beforeFilter()
	{
		/**
		 * Layout administracion y permisos publicos
		 */
		if ( ! empty($this->request->params['admin']) )
		{
			$this->layoutPath				= 'backend';
			AuthComponent::$sessionKey		= 'Auth.Administrador';
			$this->Auth->authenticate['Form']['userModel']		= 'Administrador';
		}
		else
		{
			AuthComponent::$sessionKey	= 'Auth.Usuario';
			$this->Auth->allow();
		}

		/**
		 * Logout FB
		 */
		/*
		if ( ! isset($this->request->params['admin']) && ! $this->Connect->user() && $this->Auth->user() )
			$this->Auth->logout();
		*/

		/**
		 * Detector cliente local
		 */
		$this->request->addDetector('localip', array(
			'env'			=> 'REMOTE_ADDR',
			'options'		=> array('::1', '127.0.0.1'))
		);

		/**
		 * Detector entrada via iframe FB
		 */
		$this->request->addDetector('iframefb', array(
			'env'			=> 'HTTP_REFERER',
			'pattern'		=> '/facebook\.com/i'
		));

		/**
		 * Cookies IE
		 */
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
	}

	public function beforeRender()
	{
		if ( ! isset($this->request->params['admin']) )
		{
			$busqueda		= array(
				'categorias'		=> ClassRegistry::init('Categoria')->find('all', array(
					'conditions'		=> array('Categoria.producto_activo_count >' => 0),
					'fields'			=> array('Categoria.slug', 'Categoria.nombre')
				)),
				'modelos'			=> ClassRegistry::init('Modelo')->find('all', array(
					'conditions'		=> array('Modelo.producto_activo_count >' => 0),
					'fields'			=> array('Modelo.slug', 'Modelo.nombre','Modelo.id')
				))
			);

			$slugsCategorias = array();
			$slugsModelos	= array();

			// Lista de modelos id
			$ListaModelos = array();

			// Lista de categorías
			foreach ($busqueda['categorias'] as $categoria) {
				$slugsCategorias[$categoria['Categoria']['slug']] = $categoria['Categoria']['nombre'];
			}

			// Lista de modelos
			foreach ($busqueda['modelos'] as $modelo) {
				$slugsModelos[$modelo['Modelo']['slug']] = $modelo['Modelo']['nombre'];
				$ListaModelos[$modelo['Modelo']['id']] = $modelo['Modelo']['nombre'];
			}

			// Lista de categorías completa
			$categoriasMenu = ClassRegistry::init('Categoria')->find('all', array(
					'conditions'		=> array('Categoria.producto_activo_count >' => 0)
				)
			);

			// Lista de regiones
			$ListaRegiones = ClassRegistry::init('Region')->find('list');

			
			// Camino de migas
			$breadcrumbs	= BreadcrumbComponent::get();
			if ( ! empty($breadcrumbs) && count($breadcrumbs) > 2 )
			{
				$this->set(compact('breadcrumbs'));
			}

			$this->set(compact('slugsCategorias', 'slugsModelos', 'categoriasMenu', 'ListaRegiones', 'ListaModelos', 'breadcrumbs'));
		}
	}

	/**
	 * Guarda el usuario Facebook
	 */
	public function beforeFacebookSave()
	{
		if ( ! isset($this->request->params['admin']) )
		{
			$this->Connect->authUser['Usuario']		= array_merge(array(
				'nombre_completo'	=> $this->Connect->user('name'),
				'nombre'			=> $this->Connect->user('first_name'),
				'apellido'			=> $this->Connect->user('last_name'),
				'usuario'			=> $this->Connect->user('username'),
				'clave'				=> $this->Connect->authUser['Usuario']['password'],
				'email'				=> $this->Connect->user('email'),
				'sexo'				=> $this->Connect->user('gender'),
				'verificado' 		=> $this->Connect->user('verified'),
				'edad'				=> $this->Session->read('edad')
			), $this->Connect->authUser['Usuario']);
		}

		return true;
	}

	public function getHero($slug = null) {

		$idCategoria = ClassRegistry::init('BannerCategoria')->find('first', array(
			'conditions' => array(
				'BannerCategoria.slug' => $slug
			)
		));

		$ListaBanners = array();

		if ( !empty($idCategoria) ) {
			// Sliders
			$ListaBanners = ClassRegistry::init('Banner')->find('all', array(
				'conditions' => array(
					'Banner.banner_categoria_id' => $idCategoria['BannerCategoria']['id'],
					'Banner.activo' => 1
				)
			));	
		}

		return $ListaBanners;
	}
}
