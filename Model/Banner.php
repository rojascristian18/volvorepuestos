<?php
App::uses('AppModel', 'Model');
class Banner extends AppModel
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
	public $belongsTo = array(
		'BannerCategoria' => array(
			'className'				=> 'BannerCategoria',
			'foreignKey'			=> 'banner_categoria_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			/*
			'counterCache'			=> array(
				'banner_activo_count'			=> array('Banner.activo' => true),
				'banner_inactivo_count'			=> array('Banner.activo' => false)
			),
			*/
			//'counterScope'			=> array('Asociado.modelo' => 'BannerCategoria')
		),
		'Administrador' => array(
			'className'				=> 'Administrador',
			'foreignKey'			=> 'administrador_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			/*
			'counterCache'			=> array(
				'banner_activo_count'			=> array('Banner.activo' => true),
				'banner_inactivo_count'			=> array('Banner.activo' => false)
			),
			*/
			//'counterScope'			=> array('Asociado.modelo' => 'Administrador')
		)
	);
}
