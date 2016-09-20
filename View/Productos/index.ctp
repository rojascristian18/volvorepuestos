<?= $this->element('filtro'); ?>

<div class="productos">
	<div class="row">
		<? 
			$this->Paginator->options(array(
				'title' => 'Haz click para ordenar por este criterio',
				'url' => array(
					'controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']
				)
			)); 
		?>
		Ordenar por: <?= $this->Paginator->sort('nombre'); ?> | <?= $this->Paginator->sort('precio'); ?>
	</div>
	<div class="row">
		<? foreach ( $productos as $producto ) : ?>
		<div class="col-sm-3">
			<div class="thumbnail">
				<?= $this->Html->link(
					$this->Html->image($producto['Producto']['imagen']['full']),
					array('controller' => 'productos', 'action' => 'view', $producto['Producto']['slug']),
					array('escape' => false)
				); ?>
				<div class="caption">
					<h3><?= h($producto['Producto']['nombre']); ?></h3>
					<div class="ficha">
						<p>
							Categoría:
							<? foreach ( Hash::extract($producto, 'Categoria.{n}.nombre') as $categoria_producto ) : ?>
							<span class="label label-primary"><?= h($categoria_producto); ?></span>
							<? endforeach; ?>
						</p>
						<p>Precio: <?= $this->Number->currency($producto['Producto']['precio'], 'CLP'); ?></p>
						<p>
							Modelo:
							<? foreach ( Hash::extract($producto, 'Version.{n}.Modelo.nombre') as $modelo_producto ) : ?>
							<span class="label label-primary"><?= h($modelo_producto); ?></span>
							<? endforeach; ?>
						</p>
						<p>
							Versiones:
							<? foreach ( Hash::extract($producto, 'Version.{n}.nombre') as $version_producto ) : ?>
							<span class="label label-primary"><?= h($version_producto); ?></span>
							<? endforeach; ?>
						</p>
					</div>
					<div class="acciones">
						<?= $this->Html->link(
							'Agregar a cotización',
							array('controller' => 'productos', 'action' => 'view', $producto['Producto']['slug']),
							array('class' => 'btn btn-primary')
						); ?>
					</div>
				</div>
			</div>
		</div>
		<? endforeach; ?>
	</div>
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
</div>