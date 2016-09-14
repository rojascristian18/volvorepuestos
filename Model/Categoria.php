<?php
App::uses('AppModel', 'Model');
class Categoria extends AppModel
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
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'full',
							'width'		=> 274,
							'height'	=> 274,
							'crop'		=> true
						)
					)
				),
				'imagen_secundaria'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'full',
							'width'		=> 274,
							'height'	=> 274,
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
	public $hasAndBelongsToMany = array(
		'Producto' => array(
			'className'				=> 'Producto',
			'joinTable'				=> 'categorias_productos',
			'foreignKey'			=> 'categoria_id',
			'associationForeignKey'	=> 'producto_id',
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

	/**
	 * CALLBACKS
	 */
	public function beforeSave($options = array())
	{
		/**
		 * Inserta el slug
		 */
		if ( ! empty($this->data[$this->name]['nombre']) )
		{
			$this->data[$this->name]['slug']	= mb_strtolower(Inflector::slug($this->data[$this->name]['nombre'], '-'));
		}

		return true;
	}

	public function afterSave($created, $options = array())
	{
		$this->updateCounter();
	}

	public function updateCounter()
	{
		$categorias			= $this->find('all', array(
			'contain'			=> array(
				'Producto'			=> array(
					'conditions'		=> array(
						'Producto.activo'	=> true
					)
				)
			)
		));
		foreach ( $categorias as $categoria )
		{
			$productos		= array_unique(Hash::extract($categoria, 'Producto.{n}.id'));
			$this->clear();
			$this->id		= $categoria['Categoria']['id'];
			$this->save(array(
				'producto_activo_count'	=> count($productos)
			),
			array(
				'callbacks' => false
			));
		}
	}
}
