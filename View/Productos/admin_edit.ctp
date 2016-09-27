<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-cogs"></span> Repuestos</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Repuesto</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Producto', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<?= $this->Form->input('id'); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('sku', 'SKU'); ?></th>
								<td><?= $this->Form->input('sku', array('placeholder' => 'SKU')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('codigo', 'Código'); ?></th>
								<td><?= $this->Form->input('codigo', array('placeholder' => 'Código')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('precio', 'Precio'); ?></th>
								<td><?= $this->Form->input('precio', array('placeholder' => 'Precio')); ?></td>
							</tr>
							<? if (!empty($this->request->data['Producto']['imagen'])) : ?>
								<tr>
									<th>Imagen actual</th>
									<td><?= $this->Html->image($this->request->data['Producto']['imagen']['mini']); ?></td>
								</tr>
							<? endif;?>
							<tr>
								<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
								<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('activo', 'Activo'); ?></th>
								<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
							</tr>
							<!--
							<tr>
								<th><?= $this->Form->label('administrador_id', 'Administrador'); ?></th>
								<td><?= $this->Form->input('administrador_id', array('class' => 'form-control select')); ?></td>
							</tr>
							-->
							<tr>
								<th><?= $this->Form->label('Categoria', 'Categorias'); ?></th>
								<td><?= $this->Form->input('Categoria', array('class' => 'icheckbox-multiple', 'multiple' => 'checkbox')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('Version', 'Versiones'); ?></th>
								<td><?= $this->Form->input('Version', array('class' => 'icheckbox-multiple', 'multiple' => 'checkbox')); ?></td>
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
