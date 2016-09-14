<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-car"></span> Versiones</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Version</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Version', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<?= $this->Form->input('id'); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('modelo_id', 'Modelo'); ?></th>
								<td><?= $this->Form->input('modelo_id', array('class' => 'form-control select')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('nombre', 'Versión'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Versión')); ?></td>
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
