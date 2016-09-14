<?php
App::uses('AppModel', 'Model');
class Producto extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'nombre';

	/**
	 * BEHAVIORS
	 */
	var $actsAs			= array(
		/**
		 * IMAGE UPLOAD
		 */
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'full',
							'width'		=> 600,
							'height'	=> 600,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'mid',
							'width'		=> 300,
							'height'	=> 300,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						)
					)
				)
			)
		)
	);

	/**
	 * VALIDACIONES
	 */
	public $validate = array(
		'sku' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'codigo' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'nombre' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
	);

	/**
	 * ASOCIACIONES
	 */
	public $belongsTo = array(
		'Administrador' => array(
			'className'				=> 'Administrador',
			'foreignKey'			=> 'administrador_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			/*
			'counterCache'			=> array(
				'producto_activo_count'			=> array('Producto.activo' => true),
				'producto_inactivo_count'			=> array('Producto.activo' => false)
			),
			*/
			//'counterScope'			=> array('Asociado.modelo' => 'Administrador')
		)
	);
	public $hasAndBelongsToMany = array(
		'Categoria' => array(
			'className'				=> 'Categoria',
			'joinTable'				=> 'categorias_productos',
			'foreignKey'			=> 'producto_id',
			'associationForeignKey'	=> 'categoria_id',
			'unique'				=> true,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'finderQuery'			=> '',
			'deleteQuery'			=> '',
			'insertQuery'			=> ''
		),
		'Version' => array(
			'className'				=> 'Version',
			'joinTable'				=> 'versiones_productos',
			'foreignKey'			=> 'producto_id',
			'associationForeignKey'	=> 'version_id',
			'unique'				=> true,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'finderQuery'			=> '',
			'deleteQuery'			=> '',
			'insertQuery'			=> ''
		)
	);


	public function conteoEstados($productos = array())
	{
		if ( empty($productos) )
		{
			return false;
		}

		$activos		= $this->find('count', array(
			'conditions'	=> array(
				'Producto.id'		=> $productos,
				'Producto.activo'	=> true
			),
			'callbacks'		=> false
		));
		$inactivos		= count($productos) - $activos;

		return array(
			'producto_activo_count'		=> $activos,
			'producto_inactivo_count'	=> $inactivos
		);
	}

	/**
	 * CALLBACKS
	 */
	public function beforeSave($options = array())
	{
		$this->data[$this->name]['administrador_id']	= AuthComponent::user('id');
		return true;
	}

	public function afterSave($created, $options = array())
	{
		/**
		 * Al guardar un producto, actuliza el conteo de productos para versiones, categorias y modelos
		 */
		$this->Version->updateCounter();
		$this->Categoria->updateCounter();
	}
}
