
<div class="categorias">
	<h1>Productos</h1>
	<h2>Repuestos Genuinos</h2>
	<div class="row">
		<? foreach ( $categorias as $categoria ) : ?>
		<div class="col-sm-3">
			<div class="thumbnail">
				<?= $this->Html->link(
					$this->Html->image($categoria['Categoria']['imagen']['full']),
					array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
					array('escape' => false)
				); ?>
				<div class="caption">
					<h3><?= h($categoria['Categoria']['nombre']); ?></h3>
					<div class="acciones">
						<?= $this->Html->link(
							'Ver productos',
							array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
							array('class' => 'btn btn-primary')
						); ?>
					</div>
				</div>
			</div>
		</div>
		<? endforeach; ?>
	</div>
</div>
