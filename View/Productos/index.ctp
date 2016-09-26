<?= $this->element('template/breadcrumbs'); ?>

<?= $this->element('filtro'); ?>

<?= $this->element('alertas'); ?>

<div class="productos">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?

			if (isset($categoria)) {

				$this->Paginator->options(array(
					'title' => 'Haz click para ordenar por este criterio',
					'url' => array(
						'controller' => 'productos', 'slug' => $categoria['Categoria']['slug']
					)
				));

			 	if ( ! empty($this->request->params['model']) ) : 
					$this->Paginator->options(array(
						'title' => 'Haz click para ordenar por este criterio',
						'url' => array(
							'controller' => 'productos', 'slug' => $categoria['Categoria']['slug'], 'model' => $this->request->params['model']
						)
					));
				endif;

				if ( ! empty($this->request->params['named']['model']) ) :	
					$this->Paginator->options(array(
						'title' => 'Haz click para ordenar por este criterio',
						'url' => array(
							'controller' => 'productos', 'slug' => $categoria['Categoria']['slug'], 'model' => $this->request->params['named']['model']
						)
					));
			 	endif;
			}

			if ( isset($this->request->params['srch']) ) {
				$this->Paginator->options(array(
					'title' => 'Haz click para ordenar por este criterio',
					'url' => array(
						'controller' => 'productos', 'srch' => $this->request->params['srch']
					)
				));
			}
			?>

				<div class="ordenar">
					<label>Ordenar por:</label> <?= $this->Paginator->sort('nombre'); ?> | <?= $this->Paginator->sort('precio'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<? foreach ( $productos as $producto ) : ?>
			<div class="col-sm-3">
				<div class="thumbnail">
					<?= $this->Html->image($producto['Producto']['imagen']['full']); ?>
					<div class="caption">
						<h3><?= h($producto['Producto']['nombre']); ?></h3>
						<div class="ficha">
								<div class="row">
									<div class="col-md-4">
										Categoría:
									</div>
									<div class="col-md-8">
										<? foreach ( Hash::extract($producto, 'Categoria.{n}.nombre') as $categoria_producto ) : ?>
										<span class="label label-primary"><?= h($categoria_producto); ?></span>
										<? endforeach; ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										Precio:
									</div>
									<div class="col-md-8">
										<span class="label label-primary"><?= $this->Number->currency($producto['Producto']['precio'], 'CLP'); ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										Modelo:
									</div>
									<div class="col-md-8">
										<? foreach ( Hash::extract($producto, 'Version.{n}.Modelo.nombre') as $modelo_producto ) : ?>
										<span class="label label-primary"><?= h($modelo_producto); ?></span>
										<? endforeach; ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										Versiones:
									</div>
									<div class="col-md-8">
										<? foreach ( Hash::extract($producto, 'Version.{n}.nombre') as $version_producto ) : ?>
										<span class="label label-primary"><?= h($version_producto); ?></span>
										<? endforeach; ?>
									</div>
								</div>
						</div>
						<div class="acciones">
							<button class='btn btn-primary btn-agregar-carro'  data-toggle="popover" data-trigger="focus" title="¡Repuesto ya fue agregado!" data-producto='<?=$producto['Producto']['nombre'];?>'>Agregar a cotización</button>
						</div>
					</div>
				</div>
			</div>
			<? endforeach; ?>
		</div>
		<? if (! empty($producto)) { ?>
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <?= $this->Paginator->prev('« Anterior', array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'first disabled hidden')); ?>
					    <?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 2, 'currentClass' => 'active', 'separator' => '')); ?>
					    <?= $this->Paginator->next('Siguiente »', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden')); ?>
					  </ul>
					</nav>
				</div>
			</div>
		<? } ?>
	</div>
</div>