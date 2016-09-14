<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-list"></span> Categorias</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Categoria</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Categoria', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<?= $this->Form->input('id'); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
								<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('imagen_secundaria', 'Imagen secundaria'); ?></th>
								<td><?= $this->Form->input('imagen_secundaria', array('type' => 'file')); ?></td>
							</tr>
							<!--
							<tr>
								<th><?= $this->Form->label('orden', 'Orden'); ?></th>
								<td><?= $this->Form->input('orden', array('placeholder' => 'Orden')); ?></td>
							</tr>
							-->
							<tr>
								<th><?= $this->Form->label('activo', 'Activo'); ?></th>
								<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
							</tr>
							<!--
							<tr>
								<th><?= $this->Form->label('producto_activo_count', 'Producto activo count'); ?></th>
								<td><?= $this->Form->input('producto_activo_count', array('placeholder' => 'Producto activo count')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('producto_inactivo_count', 'Producto inactivo count'); ?></th>
								<td><?= $this->Form->input('producto_inactivo_count', array('placeholder' => 'Producto inactivo count')); ?></td>
							</tr>
							-->
							<tr>
								<th><?= $this->Form->label('Producto', 'Producto'); ?></th>
								<td><?= $this->Form->input('Producto', array('class' => 'icheckbox-multiple', 'multiple' => 'checkbox')); ?></td>
							</tr>
						</table>

						<div class="pull-right">
							<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
							<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
						</div>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
