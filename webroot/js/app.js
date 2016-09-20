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

		}
	}
});

$(document).ready(function(){

	$.app.init();

});
