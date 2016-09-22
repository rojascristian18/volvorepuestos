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


			/**
			* Inicio plugins
			*/
			//$.app.plugins.carro.total();
			//$.app.plugins.carro.agregar();
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
		plugins : {
			carro : {
				/**
				* Obtener total de productos en el carro
				*/
				total: function() {
					if ( $('#header .carro .contador').length ) {

						$.ajax({	
							method : 'GET',
							url : webroot + 'productos/totalcarro',
						})
						.done(function(res) {
							if (res != 0) {
								resultado = $.parseJSON(res);
								$('#header .carro .contador .total-carro').html('(' + resultado['catalogo-productos'].Meta.Cantidad + ')');
							}
						});
						
					}
				},
				/**
				* Agregar producto al carro
				*/
				agregar: function () {
					if ( $('.productos .thumbnail .acciones .btn-agregar-carro').length ) {

						//$.app.plugins.popover($('.productos .thumbnail .acciones .btn-agregar-carro'));

						$('.productos .thumbnail .acciones .btn-agregar-carro').on('click', function(event){
							event.preventDefault();

							var producto = $(this).data('producto');

							$.ajax({	
								method : 'GET',
								url : webroot + 'productos/agregarcarro/' + producto,
							})
							.done(function(res) {
								
								// Agregado con éxito
								if (res == 1) {
									console.log('agregado');
									$.app.plugins.carro.total();
								}

								// Yá existe
								if (res == 3) {
									console.log('Producto yá está en el carro');
								}

								// Error
								if (res == 0) {
									console.log('Error');
								};
							});
							
						});

					};
				}
			},
			popover : function(element) {
				//element.popover('toggle');
			}
		}
	}
});

$(document).ready(function(){

	$.app.init();

});
