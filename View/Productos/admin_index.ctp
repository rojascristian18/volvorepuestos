<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-cogs"></span> Repuestos</h2>
		</div>

		<div class="page-content-wrap">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de Repuestos</h3>
					<div class="btn-group pull-right">
						<?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo Producto', array('action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
						<?= $this->Html->link('<i class="fa fa-file-excel-o"></i> Exportar a Excel', array('action' => 'exportar'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="sort">
									<? $this->Paginator->options(array('title' => 'Haz click para ordenar por este criterio')); ?>
									<th><?= $this->Paginator->sort('imagen'); ?></th>
									<th><?= $this->Paginator->sort('sku', 'SKU'); ?></th>
									<th><?= $this->Paginator->sort('codigo'); ?></th>
									<th><?= $this->Paginator->sort('nombre'); ?></th>
									<th><?= $this->Paginator->sort('precio'); ?></th>
									<th>Categorías</th>
									<th>Versiones</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<? foreach ( $productos as $producto ) : ?>
								<tr>
									<td><?= $this->Html->image($producto['Producto']['imagen']['mini']); ?>&nbsp;</td>
									<td><?= h($producto['Producto']['sku']); ?>&nbsp;</td>
									<td><?= h($producto['Producto']['codigo']); ?>&nbsp;</td>
									<td><?= h($producto['Producto']['nombre']); ?>&nbsp;</td>
									<td><?= $this->Number->currency($producto['Producto']['precio'], 'CLP'); ?>&nbsp;</td>
									<td>
										<? foreach ( Hash::extract($producto, 'Categoria.{n}.nombre') as $categoria_producto ) : ?>
										<span class="label label-primary"><?= h($categoria_producto); ?></span>
										<? endforeach; ?>
									</td>
									<td>
										<? foreach ( Hash::extract($producto, 'Version.{n}.nombre') as $version_producto ) : ?>
										<span class="label label-primary"><?= h($version_producto); ?></span>
										<? endforeach; ?>
									</td>
									<td>
										<?= $this->Html->link('<i class="fa fa-edit"></i> Editar', array('action' => 'edit', $producto['Producto']['id']), array('class' => 'btn btn-xs btn-info', 'rel' => 'tooltip', 'title' => 'Editar este registro', 'escape' => false)); ?>
										<?= $this->Form->postLink('<i class="fa fa-remove"></i> Eliminar', array('action' => 'delete', $producto['Producto']['id']), array('class' => 'btn btn-xs btn-danger confirmar-eliminacion', 'rel' => 'tooltip', 'title' => 'Eliminar este registro', 'escape' => false)); ?>
										<? if ( $producto['Producto']['activo'] ) : ?>
										<?= $this->Html->link('<i class="fa fa-ban"></i> Desactivar', array('action' => 'desactivar', $producto['Producto']['id']), array('class' => 'btn btn-xs btn-danger', 'rel' => 'tooltip', 'title' => 'Desactivar este registro', 'escape' => false)); ?>
										<? else : ?>
										<?= $this->Html->link('<i class="fa fa-check"></i> Activar', array('action' => 'activar', $producto['Producto']['id']), array('class' => 'btn btn-xs btn-success', 'rel' => 'tooltip', 'title' => 'Activar este registro', 'escape' => false)); ?>
										<? endif; ?>
									</td>
								</tr>
								<? endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="pull-right">
			<ul class="pagination">
				<?= $this->Paginator->prev('« Anterior', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'first disabled hidden')); ?>
				<?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 2, 'currentClass' => 'active', 'separator' => '')); ?>
				<?= $this->Paginator->next('Siguiente »', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden')); ?>
			</ul>
		</div>
	</div>
</div>
