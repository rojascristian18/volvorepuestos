<?php
App::uses('AppModel', 'Model');
class Version extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'modelo_version';

	/**
	 * BEHAVIORS
	 */
	var $actsAs			= array(
		/**
		 * IMAGE UPLOAD
		 */
		/*
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
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
		*/
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
	public $belongsTo = array(
		'Modelo' => array(
			'className'				=> 'Modelo',
			'foreignKey'			=> 'modelo_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> array(
				'version_activo_count'			=> array('Version.activo' => true),
				'version_inactivo_count'		=> array('Version.activo' => false)
			),
			//'counterScope'			=> array('Asociado.modelo' => 'Modelo')
		)
	);
	public $hasAndBelongsToMany = array(
		'Producto' => array(
			'className'				=> 'Producto',
			'joinTable'				=> 'versiones_productos',
			'foreignKey'			=> 'version_id',
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

	public function beforeSave($options = array())
	{
		/**
		 * Inserta el slug
		 */
		if ( ! empty($this->data[$this->name]['nombre']) )
		{
			$this->data[$this->name]['slug']	= mb_strtolower(Inflector::slug($this->data[$this->name]['nombre'], '-'));
		}

		/**
		 * Inserta el nombre del modelo - version
		 */
		if ( ! empty($this->data[$this->name]['modelo_id']) )
		{
			$modelo			= $this->Modelo->find('first', array(
				'fields'		=> array('Modelo.nombre'),
				'conditions'	=> array('Modelo.id' => $this->data[$this->name]['modelo_id']),
				'callbacks'		=> false
			));
			$this->data[$this->name]['modelo_version']	= sprintf('%s - %s', $modelo['Modelo']['nombre'], $this->data[$this->name]['nombre']);
		}

		return true;
	}

	public function afterSave($created, $options = array())
	{
		/**
		 * Actualiza el conteo de productos
		 */
		$this->updateCounter();
	}

	public function updateCounter()
	{
		$versiones			= $this->find('all', array(
			'contain'			=> array(
				'Producto'			=> array(
					'conditions'		=> array(
						'Producto.activo'	=> true
					)
				)
			)
		));
		foreach ( $versiones as $version )
		{
			$productos		= array_unique(Hash::extract($version, 'Producto.{n}.id'));
			$this->clear();
			$this->id		= $version['Version']['id'];
			$this->save(array(
				'producto_activo_count'	=> count($productos)
			),
			array(
				'callbacks' => false
			));
		}

		$this->Modelo->updateCounter();
	}
}
