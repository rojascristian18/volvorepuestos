/**
* Script for volvo bus&truks
* @Cristian Rojas for Reach-Latam.com
*/

$.extend({
	app : {
		init : function() {
			/**
			* Inicio de las funciones del la App
			*/
			$.app.step.init();

			$.app.formulario.init();

			$.app.desplazar.init();

			/**
			* Inicio plugins
			*/
			$.app.plugins.feTagsinput();

			$.app.plugins.popover();
			//$.app.plugins.carro.total();
			$.app.plugins.carro.agregar();
		},
		step : {
			init : function(){
				if ( $('.filtro-modelos').length ) {
					$.app.step.bind();
				};
			},
			bind : function(){

				$('.filtro-categoria').on('click', function(event) {
					event.preventDefault();

					if ( $(this).hasClass('activa') ) {
						$(this).removeClass('activa');
						$(this).addClass('oculta');
						if ( $(this).next().hasClass('oculta') ) {
							$(this).next().removeClass('oculta');
							$(this).next().addClass('activa');
						};

					}

				});

				$('.atras-filtro').on('click', function(){

					if ( $(this).parents('.filtro').find('.filtro-categoria').hasClass('oculta') && $(this).parents('.filtro').find('.filtro-modelos').hasClass('activa') ) {
						
						$(this).parents('.filtro').find('.filtro-modelos').removeClass('activa');
						$(this).parents('.filtro').find('.filtro-modelos').addClass('oculta');

						$(this).parents('.filtro').find('.filtro-categoria').removeClass('oculta');
						$(this).parents('.filtro').find('.filtro-categoria').addClass('activa');

					};

				});

			}
		},
		formulario: {
			init : function() {
				if ($('#LeadLeadForm').length > 0) {
					$.app.formulario.bind();
				}
			},
			bind :  function(){
				/**
				 * Enmascaramiento y restriccion de inputs
				 */
				$('#LeadNombre, #LeadEmail, #LeadMensaje').alphanumeric({ allow: ' ' });
				$('#LeadTelefono').mask('9 999 9999', { placeholder: 'X' });

				/**
				 * Validaciones
				 */
				$('#LeadLeadForm').validate({
					rules			: {
						'data[Lead][nombre]': {
							required		: true
						},
						'data[Lead][email]': {
							required		: true,
							email 			: true
						},
						'data[Lead][telefono]': {
							required		: true
						},
						'data[Lead][region]': {
							required		: true
						},
						'data[Lead][modelo]': {
							required		: true
						},
						'data[Lead][mensaje]': {
							required		: true
						}
					},
					messages		: {
						'data[Lead][nombre]': {
							required		: 'Debe ingresar su nombre'
						},
						'data[Lead][email]': {
							required		: 'Debe ingresar su email',
							email			: 'Debe ingresar un email válido'
						},
						'data[Lead][telefono]': {
							required		: 'Debe ingresar su teléfono'
						},
						'data[Lead][region]': {
							required		: 'Debe seleccionar región'
						},
						'data[Lead][modelo]': {
							required		: 'Debe seleccionar modelo'
						},
						'data[Lead][mensaje]': {
							required		: 'Debes ingresar su mensaje',
						}
					}
				});
			}
		},
		desplazar: {
			init: function() {

				window.onload = function(){
					  
				    if (location.href.match(/repuestos/)) {
				    	$('html, body').animate({
				    		scrollTop : $('.breadcrums-wrapper').offset().top
				    	},1800);
				    }
				  
				};
			}
		},
		plugins : {
			carro : {
				/**
				* Agregar producto al carro
				*/
				agregar: function () {
					if ( $('.productos .thumbnail .acciones .btn-agregar-carro').length ) {

						$('.productos .thumbnail .acciones .btn-agregar-carro').on('click', function(event){
							event.preventDefault();

							var producto = $(this).data('producto');

							var esto = $(this);

							/**
							* Titulo del popover
							*/
							var popoverTitulo = esto.attr('title');
							console.log(popoverTitulo);

							/**
							* Verificar existencia en input
							*/
							var inputValores = $('#LeadRepuesto').val();

							var arrayValores = inputValores.split(',');

							
							if ($.inArray(producto, arrayValores) == 0) {
								$(this).popover('show');
								setTimeout(function(){
									esto.popover('hide');
								},1500);
							}

							if ($.inArray(producto, arrayValores) > 0) {
								$(this).popover('show');
								setTimeout(function(){
									esto.popover('hide');
								},1500);
							}

							if ($.inArray(producto, arrayValores) < 0) {
								console.log('no existe');

								$(this).popover('show');
								$('.popover .popover-title').text('¡Repuesto agregado!');
								setTimeout(function(){
									esto.popover('hide');
								},1500);
							}


							// Se agregan al input
							$('#LeadRepuesto_tag').val(producto);
							$('#LeadRepuesto_tag').trigger('blur');
							
						});

					};
				}
			},
			popover : function() {
				$("[data-toggle=popover]").popover({
					trigger : 'manual'
				});
            	//$(".popover-dismiss").popover({trigger: 'focus'});
			},
        	feTagsinput : function() {
	            if($(".tagsinput").length > 0){

	                $(".tagsinput").each(function(){

	                    if($(this).data("placeholder") != ''){
	                        var dt = 'Agregar repuesto';
	                    }else{
	                        var dt = 'Agregar repuesto';
	                    }
	                    $(this).tagsInput({width: '100%',height:'auto',defaultText: dt});

	                    $(this).removeAttr('disabled');

	                });

	            }
	        }
		}
	}
});

$(document).ready(function(){

	$.app.init();

});
