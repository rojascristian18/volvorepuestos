/* jshint bitwise:true, browser:true, eqeqeq:true, forin:true, globalstrict:true, indent:4, jquery:true,
   loopfunc:true, maxerr:3, noarg:true, node:true, noempty:true, onevar: true, quotmark:single,
   strict:true, undef:true, white:false */
/* global FB, webroot, fullwebroot */

/*!
 * BrandOn - Landings
 */

//<![CDATA[
'use strict';

/**
 * jQuery
 */
jQuery(document).ready(function($)
{
	/**
	 * Agregar un nuevo clon
	 */
	$('.js-clon-agregar').on('click', function(evento, data)
	{
		evento.preventDefault();

		var $this			= $(this),
			$scope			= $this.parents('.js-clon-scope').first(),
			$base			= $('.js-clon-base', $scope),
			$contenedor		= $('.js-clon-contenedor', $scope),
			$clon			= $base.clone(),
			$tr;

		/**
		 * Hace visible al elemento clonado y quita los atributos de deshabilitado
		 */
		$clon.removeClass('hidden js-clon-base');
		$clon.find('input, select, textarea').each(function()
		{
			$(this).removeAttr('disabled');
		});
		$clon.find('select').selectpicker();
		$clon.find('input[type="checkbox"]').iCheck(
		{
			checkboxClass	: 'icheckbox_flat-red',
			radioClass		: 'iradio_flat-red',
			increaseArea	: '20%'
		});

		/**
		 * Si es accion clonar, copia los datos y escribe la fila bajo la seleccionada
		 */
		if ( typeof(data) === 'object' && typeof(data.clone) !== 'undefined' )
		{
			$tr			= $(data.element).parents('tr').first();
			$tr.find('input, select, textarea').each(function(index)
			{
				$clon.find('input, select, textarea').eq(index).val($(this).val());
			});
			$tr.after($clon.show());
		}

		/**
		 * Si es accion agregar, agrega la fila al final de la tabla
		 */
		else
		{
			$contenedor.append($clon.show());
		}

		/**
		 * Reindexa
		 */
		clonReindexar();

		/**
		 * Actualiza el alto del contenido
		 */
		page_content_onresize();
	});

	/**
	 * Eliminar clon
	 */
	$('.js-clon-contenedor').on('click', '.js-clon-eliminar', function(evento)
	{
		evento.preventDefault();

		var $this			= $(this),
			$tr				= $this.parents('tr').first();

		$tr.remove();

		/**
		 * Reindexa
		 */
		clonReindexar();
	});

	/**
	 * Clonar
	 */
	$('.js-clon-contenedor').on('click', '.js-clon-clonar', function(evento)
	{
		evento.preventDefault();
		var $scope			= $(this).parents('.js-clon-scope').first();
		$('.js-clon-agregar', $scope).trigger('click', { clone: true, element: this });
	});

	/**
	 * Agrega un clon en blanco si es necesario
	 */
	if ( $('.js-clon-blank').length )
	{
		$('.js-clon-blank').parents('.js-clon-scope').find('.js-clon-agregar').trigger('click');
	}

	/**
	 * Reindexa los input clonados, agregados o eliminados
	 */
	function clonReindexar()
	{
		var $contenedor			= $('.js-clon-contenedor');

		$contenedor.find('tr:visible').each(function(index)
		{
			$(this).find('input, select, textarea').each(function()
			{
				var $that		= $(this),
					nombre		= $that.attr('name').replace(/\[(\d+)\]/g, '[' + (index + 1) + ']');

				if ( nombre.match(/\[orden\]$/i) )
				{
					$that.val(index);
				}
				$that.attr('name', nombre);
			});
		});
	}

	/**
	 * Dashboard - Carrusel
	 */
	if ( $('.owl-carousel').length )
	{
		$('.owl-carousel').owlCarousel(
		{
			mouseDrag			: false,
			touchDrag			: true,
			slideSpeed			: 300,
			paginationSpeed		: 400,
			singleItem			: true,
			navigation			: false,
			autoPlay			: true
		});
    }

	/**
	 * Dashboard - Graficos
	 */
	if ( $('#dash-leads-meses').length )
	{
		var data	= [], x;
		for ( x in meses )
		{
			if ( meses.hasOwnProperty(x) )
			{
				data.push(
				{
					x		: meses[x].ultimo,
					y1		: meses[x].leads
				});
			}
		}
		Morris.Line(
		{
			element			: 'dash-leads-meses',
			data			: data,
			xkey			: 'x',
			xLabels			: 'month',
			xLabelMargin	: 50,
			ykeys			: ['y1'],
			labels			: ['Leads'],
			//goals			: [27],
			//events: ['2016-01-01', '2016-02-01', '2016-03-01'],
			parseTime		: false,
			resize			: true,
			hideHover		: true,
			gridTextSize	: 11,
			lineColors		: ['#3FBAE4','#33414E'],
			lineWidth		: 4,
			gridLineColor	: '#BBB'
		});
	}

	/**
	 * Dashboard - Grafico 2
	 */
	if ( $('#dash-leads-dias').length )
	{
		var data	= [], x;
		for ( x in dias )
		{
			if ( dias.hasOwnProperty(x) )
			{
				data.push(
				{
					x		: dias[x].dia,
					y1		: dias[x].leads
				});
			}
		}
		Morris.Line(
		{
			element			: 'dash-leads-dias',
			data			: data,
			xkey			: 'x',
			xLabels			: 'day',
			xLabelMargin	: 50,
			ykeys			: ['y1'],
			labels			: ['Leads'],
			//goals			: [27],
			//events: ['2016-01-01', '2016-02-01', '2016-03-01'],
			parseTime		: false,
			resize			: true,
			hideHover		: true,
			gridTextSize	: 11,
			lineColors		: ['#95B75D', '#DD4343'],
			lineWidth		: 4,
			gridLineColor	: '#BBB'
		});
	}


	/**
	 * Filtro formulario - libre
	 */
	$('[name="data[Lead][formulario_id]"]').on('change', function()
	{
		if ( $.trim($(this).val()) !== '' )
		{
			$('.busqueda-libre').removeClass('hidden');
		}
		else
		{
			$('.busqueda-libre').addClass('hidden');
			$('.busqueda-libre input').val('');
		}
	});


	/**
	 * Check multiple
	 */
	if ( $('.icheckbox-multiple input[type="checkbox"]').length )
	{
		$('.icheckbox-multiple input[type="checkbox"]').iCheck(
		{
			checkboxClass	: 'icheckbox_flat-red',
			radioClass		: 'iradio_flat-red',
			increaseArea	: '20%'
		});
	}


	/**
	 * Administrador tipo full
	 */
	$('.admin-ilimitado input').on('ifToggled', function()
	{
		$('.admin-formularios-asignados').toggle(! $(this).is(':checked'));
	}).trigger('ifToggled');

	/**
	 * Perfil tipo administrador
	 */
	$('.admin-perfil input').on('ifToggled', function()
	{
		$('.admin-perfil-permisos').toggle(! $(this).is(':checked'));
	}).trigger('ifToggled');


	/**
	 * Ordenamiento de campos
	 */
	if ( $('.js-sortable-table').length )
	{
		$('.js-sortable-table').sortable(
		{
			containment		: 'parent',
			cursor			: 'move',
			items			: '> tr',
			axis			: 'y',
			opacity			: 0.95,
			placeholder		: 'sortable-placeholder',
			handle			: '.move-handler',
			tolerance		: 'pointer',
			helper			: function(e, ui)
			{
				ui.children().each(function()
				{
					$(this).width($(this).width());
				});
				return ui;
			},
			stop			: function()
			{
				$('.js-sortable-table tr:visible').each(function(index, tr)
				{
					$(tr).find('.input-order').val(index + 1);
				});
			}
		});//.disableSelection();
		$('.move-handler').on('click', false);
	}


	/**
	 * Datatables
	 */
	if ( $('.datatable').length )
	{
		jQuery.extend(jQuery.fn.dataTableExt.oSort,
		{
			'num-html-pre'	: function(a)
			{
				var x = String(a).replace( /<[\s\S]*?>/g, '' );
				return parseFloat( x );
			},
			'num-html-asc'	: function(a, b)
			{
				return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			},
			'num-html-desc'	: function(a, b)
			{
				return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			}
		});
		$('.datatable').each(function()
		{
			var $columns	= $(this).find('thead tr th'),
				types		= [];

			$.each($columns, function(index, th)
			{
				if ( typeof($(th).data('type')) !== 'undefined' )
				{
					types.push(
					{
						type			: $(th).data('type')
					});
				}
				else
				{
					types.push(null);
				}
			});
			$(this).dataTable(
			{
				columns			: types,
				ordering		: true,
				pageLength		: 25,
				searching		: true,
				info			: false,
				language		: {
					search			: 'Buscar',
					paginate		: {
						previous		: '« Anterior',
						next			: 'Siguiente »'
					},
					lengthMenu		: 'Mostrar _MENU_ registros',
					emptyTable		: 'No se encontraron registros',
					zeroRecords		: 'No se encontraron registros'
				},
				drawCallback	: function()
				{
					page_content_onresize();
				}
			});
		});

		$('.datatable thead a').on('click', function(evento)
		{
			evento.preventDefault();
		});

		setTimeout(function()
		{
			$('div.dataTables_filter input').focus();
		}, 200);
	}


	/**
	 * Ordenamiento de tablas generico
	 */
	if ( $('.js-generico-contenedor-sort').length )
	{
		$('.js-generico-contenedor-sort').sortable(
		{
			axis			: 'y',
			cursor			: 'move',
			helper			: function(e, tr)
			{
				var $originals	= tr.children(),
					$helper		= tr.clone();

				$helper.children().each(function(index)
				{
					$(this).width($originals.eq(index).width());
				});
				return $helper;
			},
			stop			: function(e, ui)
			{
				$('td.js-generico-orden', ui.item.parent()).each(function(i)
				{
					var $this		= $(this);
					$this.find('input').val(i + 1);
					$this.find('span').text(i + 1);
				});

				var $form		= ui.item.parents('form').first();
				$.post($form.attr('action'), $form.serialize());
			}
		}).disableSelection();

		$('.js-generico-handle-sort').on('click', function(evento)
		{
			evento.preventDefault();
		});
	}


	/**
	 * Select estados
	 */
	if ( $('select.select').length )
	{
		$('select.select').selectpicker();
		$('select.select').on('change', function()
		{
			page_content_onresize();
		});
	}

	if ( $('input.icheckbox').length )
	{
		$('input.icheckbox').iCheck(
		{
			checkboxClass	: 'icheckbox_flat-red',
			radioClass		: 'iradio_flat-red',
			increaseArea	: '20%'
		});
		$('input.icheckbox').on('ifChanged', function (evento)
		{
			$(evento.target).trigger('change');
		});
	}

	/**
	 * Acciones en lote
	 */
	var inpt_chck_head			= $('input:checkbox[data-batch]'),
		inpt_chck_body			= $('input:checkbox[data-batch-input]'),
		batch_actions_btn		= $('a[data-batch-action]');

	if ( inpt_chck_body.length )
	{
		inpt_chck_head.change(function()
		{
			if ( $(this).is(':checked') )
			{
				inpt_chck_body.iCheck('check')
				inpt_chck_body.prop('checked', true);
			}
			else
			{
				inpt_chck_body.iCheck('uncheck')
				inpt_chck_body.prop('checked', false);
			}
			updateBatchForms();
		});

		inpt_chck_body.change(function()
		{
			if ( $('input:checkbox[data-batch-input]:checked').length === inpt_chck_body.length )
			{
				inpt_chck_head.prop('checked', true);
			}
			else
			{
				inpt_chck_head.prop('checked', false);
			}
			updateBatchForms();
		});
	}

	function updateBatchForms()
	{
		if ( $('input:checkbox[data-batch-input]:checked').length )
		{
			var inputs = '';
			var counter = 0;

			$('input:checkbox[data-batch-input]:checked').each(function()
			{
				var item_id = $(this).val();
				inputs += '<input type="hidden" name="data[Lead][' + counter + '][id]" value="' + item_id + '">';
				counter++;
			});

			batch_actions_btn.each(function()
			{
				var batch_form = $(this).parent().find('form');
				batch_form.find('input').not('input[name="_method"]').remove();
				batch_form.append(inputs);
			});
		}
	}

	/*if ( batch_actions_btn.length ){

	    batch_actions_btn.each(function(){

	    	var form_id = $(this).parent().find('form').attr('id');

	    });
	}*/


	/**
	 * Funcion que permite obtener en formato YYYY-MM-DD una fecha determinada
	 * @param			{Object}			fecha			Fecha que se desea obtener
	 * @returns			{Object}			fecha			Fecha en formato YYYY-MM-DD
	 */
	function obtenerFecha(fecha)
	{
		return fecha.getFullYear() + '-' + (fecha.getMonth() + 1) + '-' + fecha.getDate();
	}

	/**
	 * Idioma español datepicker
	 */
	!function(a)
	{
		a.fn.datepicker.dates.es = {
			days			: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			daysShort		: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
			daysMin			: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
			months			: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort		: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			today			: 'Hoy',
			clear			: 'Borrar',
			weekStart		: 1,
			format			: 'dd/mm/yyyy'
		}
	}(jQuery);

	/**
	 * Buscador de OC - Datepicker rango fechas
	 */
	var $buscador_fecha_inicio		= $('#LeadFechaInicio'),
		$buscador_fecha_fin			= $('#LeadFechaFin');

	if ( $buscador_fecha_inicio.length )
	{
		$buscador_fecha_inicio.datepicker(
		{
			language	: 'es',
			format		: 'yyyy-mm-dd'
		}).on('changeDate', function(data)
		{
			$buscador_fecha_fin.datepicker('setStartDate', data.date);
		});

		$buscador_fecha_fin.datepicker(
		{
			language	: 'es',
			format		: 'yyyy-mm-dd'
		}).on('changeDate', function(data)
		{
			$buscador_fecha_inicio.datepicker('setEndDate', data.date);
		});
	}

	/**
	 * Buscador de OC - Rango de fecha predeterminada
	 */
	$('.js-data-search').on('click', function(evento)
	{
		evento.preventDefault();

		var $this			= $(this),
			tipo			= $this.data('tipo'),
			rango			= $this.data('rango'),
			fecha_inicio	= new Date();

		/**
		 * Limpia las fechas
		 */
		if ( tipo == 'todo' )
		{
			$buscador_fecha_inicio.datepicker('update', '');
			$buscador_fecha_fin.datepicker('update', '');
		}
		else
		{
			var method = {
				dia		: ['setDate', 'getDate'],
				mes		: ['setMonth', 'getMonth'],
				ano		: ['setYear', 'getFullYear']
			};

			/**
			* Calcula la fecha
			*/
			fecha_inicio[method[tipo][0]](fecha_inicio[method[tipo][1]]() - rango);
			$buscador_fecha_inicio.datepicker('setDate', obtenerFecha(fecha_inicio));
			$buscador_fecha_fin.datepicker('setDate', obtenerFecha(new Date));
		}
	});

	/**
	 * Limpia filtros
	 */
	$('.js-limpiar-busqueda').on('click', function(evento)
	{
		evento.preventDefault();
		var $this			= $(this),
			tipo			= $this.data('tipo'),
			$parent			= $this.parents('.js-caja-buscar'),
			$input;

		if ( $parent.length )
		{
			$input			= $('[data-tipo="' + tipo + '"]', $parent).not(this);
		}
		else
		{
			$input			= $('[data-tipo="' + tipo + '"]').not(this);
		}

		if ( tipo === 'libre' )
		{
			$input.val('');
		}
		if ( tipo === 'fecha' )
		{
			$input.datepicker('update', '').datepicker('clearDates');
		}
		if ( tipo === 'estado' )
		{
			$input.selectpicker('deselectAll').trigger('change');
		}
	});


	/**
	 * Input solo digitos
	 */
	$('.js-restrict-digits').keydown(function(evento)
	{
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(evento.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// Allow: Ctrl+A
		   (evento.keyCode == 65 && evento.ctrlKey === true) ||
			// Allow: Ctrl+C
		   (evento.keyCode == 67 && evento.ctrlKey === true) ||
			// Allow: Ctrl+X
		   (evento.keyCode == 88 && evento.ctrlKey === true) ||
			// Allow: home, end, left, right
		   (evento.keyCode >= 35 && evento.keyCode <= 39)) {
				// let it happen, don't do anything
				return;
		}
		// Ensure that it is a number and stop the keypress
		if ((evento.shiftKey || (evento.keyCode < 48 || evento.keyCode > 57)) && (evento.keyCode < 96 || evento.keyCode > 105)) {
			evento.preventDefault();
		}
	});


	/**
	 * Borrar contenido test formularios
	 */
	$('.btn-borrar-contenido-test').on('click', function(evento)
	{
		evento.preventDefault();
		var $this		= $(this),
			$tr			= $this.parents('tr').first(),
			$input		= $tr.find('input[type="text"]');

		$input.val('');
	});


	/**
	 * Selects autosubmit
	 */
	$('[data-autosubmit]').on('change', function()
	{
		var $this		= $(this),
			$form		= $this.parents('form').first();

		if ( !! $this.data('autosubmit') )
		{
			$form.submit();
		}
	});
});

//]]>
