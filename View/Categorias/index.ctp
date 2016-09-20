
<div class="categorias">
	<h1>Productos</h1>
	<h2>Repuestos Genuinos</h2>
	<div class="row">
		<? foreach ( $categorias as $categoria ) : ?>
		<div class="col-sm-3">
			<div class="thumbnail filtro">
				<div class="filtro-categoria activa">
					<?= $this->Html->link(
						$this->Html->image($categoria['Categoria']['imagen']['full']),
						array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
						array('escape' => false)
					); ?>
				</div>
				<div class="filtro-modelos oculta">
					<h3>Seleccione un modelo</h3>
					<? foreach ($modelos as $modelo) : ?>
						<?= $this->Html->link( $modelo['Modelo']['nombre'] , array('controller' =>'productos','action' => 'index', 'slug' => $categoria['Categoria']['slug'] ,'modelo' =>$modelo['Modelo']['id']), array('class' => 'btn btn-primary', 'rel' => 'tooltip', 'title' => 'Ver productos', 'escape' => false)); ?>
					<? endforeach; ?>
					<label class="atras-filtro"><< Cancelar</label>
					<?= $this->Html->link(
						'Ver todos los productos',
						array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
						array('escape' => false)
					); ?>
				</div>
				<div class="caption">
					<h3><?= h($categoria['Categoria']['nombre']); ?></h3>
				</div>
			</div>
		</div>
		<? endforeach; ?>
	</div>
</div>
