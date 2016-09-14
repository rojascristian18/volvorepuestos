<?php
App::uses('AppModel', 'Model');
class Modelo extends AppModel
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
	public $hasMany = array(
		'Version' => array(
			'className'				=> 'Version',
			'foreignKey'			=> 'modelo_id',
			'dependent'				=> false,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'exclusive'				=> '',
			'finderQuery'			=> '',
			'counterQuery'			=> ''
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

	public function updateCounter()
	{
		$modelos		= $this->find('list', array(
			'callbacks'		=> false
		));
		foreach ( $modelos as $id => $modelo )
		{
			$productos		= $this->Version->find('all', array(
				'fields'			=> array(
					'SUM(Version.producto_activo_count) AS producto_activo_count',
					'SUM(Version.producto_inactivo_count) AS producto_inactivo_count'
				),
				'conditions'		=> array(
					'Version.modelo_id'		=> $id,
					'Version.activo'		=> true
				)
			));
			$this->clear();
			$this->id	= $id;
			$this->save(
				$productos[0][0],
				array('callbacks' => false)
			);
		}
	}
}
