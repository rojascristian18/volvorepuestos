<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-picture-o"></span> Banners</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Banner</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Banner', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<?= $this->Form->input('id'); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('banner_categoria_id', 'Banner categoria'); ?></th>
								<td><?= $this->Form->input('banner_categoria_id', array('class' => 'form-control select')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Nombre')); ?></td>
							</tr>
							<? if (!empty($this->request->data['Banner']['imagen'])) : ?>
								<tr>
									<th>Imagen actual</th>
									<td><?= $this->Html->image($this->request->data['Banner']['imagen']['mini']); ?></td>
								</tr>
							<? endif;?>
							<tr>
								<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
								<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('orden', 'Orden'); ?></th>
								<td><?= $this->Form->input('orden', array('placeholder' => 'Orden')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('activo', 'Activo'); ?></th>
								<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('administrador_id', 'Administrador'); ?></th>
								<td><?= $this->Form->input('administrador_id', array('class' => 'form-control select')); ?></td>
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
