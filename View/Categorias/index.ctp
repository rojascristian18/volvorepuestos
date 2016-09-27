
<div class="categorias">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="titulo">Nuestros Productos</h1>
				<h2 class="subtitulo">Repuestos Genuinos</h2>
			</div>
		</div>
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
							<?= $this->Html->link(
								$modelo['Modelo']['nombre'],
								array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug'], 'model' => $modelo['Modelo']['slug']),
								array('class' => 'btn btn-primary', 'escape' => false)
							); ?>
						<? endforeach; ?>
						<?= $this->Html->link(
							'Ver todos los productos',
							array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
							array( 'escape' => false, 'class' => 'ver-todo')
						); ?>

						<label class="atras-filtro"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancelar</label>
					</div>
					<div class="caption">
						<h3><?= h($categoria['Categoria']['nombre']); ?></h3>
					</div>
				</div>
			</div>
			<? endforeach; ?>
		</div>
	</div>
</div>

<div class="concesionarios-home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="titulo">Nuestros Concecionarios</h1>
			</div>
		</div>
		<div class="row">
			<? foreach ( $concesionarios as $concesionario ) : ?>
			<div class="col-sm-3">
				<div class="concesionario-item">
					<h3><?=$concesionario['Concesionario']['nombre'];?></h3>
					<address><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$concesionario['Concesionario']['direccion'];?><br />
					<?=$concesionario['Comuna']['nombre'];?>, <?=$concesionario['Comuna']['Region']['nombre'];?>
					</address>
					<i class="fa fa-phone" aria-hidden="true"></i> <?=$concesionario['Concesionario']['telefono'];?>
					<?=$this->Html->link(
						'Ver concesionario', array('controller' => 'concesionarios', 'action' => 'detail', $concesionario['Concesionario']['slug']), array('class' => 'btn btn-primary center-block')
					   );?>
				</div>
			</div>
			<? endforeach; ?>
			<div class="col-sm-3">
				<div class="concesionario-item">
					<h3>Concecionarios</h3>
					<?=$this->Html->link(
						'ir a la página', array('controller' => 'concesionarios', 'action' => 'index'), array('class' => 'btn btn-primary center-block')
					   );?>
				</div>
			</div>
		</div>
	</div>
</div>

