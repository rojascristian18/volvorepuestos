<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-building"></span> Concesionarios</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nuevo Concesionario</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Concesionario', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('comuna_id', 'Comuna'); ?></th>
								<td><?= $this->Form->input('comuna_id', array('class' => 'form-control select')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('direccion', 'Direccion'); ?></th>
								<td><?= $this->Form->input('direccion', array('placeholder' => 'Direccion')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('telefono', 'Telefono'); ?></th>
								<td><?= $this->Form->input('telefono', array('placeholder' => 'Telefono')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('horario', 'Horario'); ?></th>
								<td><?= $this->Form->input('horario', array('placeholder' => 'Horario')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('gerente_sucursal', 'Gerente sucursal'); ?></th>
								<td><?= $this->Form->input('gerente_sucursal', array('placeholder' => 'Gerente sucursal')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('consultores_servicio', 'Consultores servicio'); ?></th>
								<td><?= $this->Form->input('consultores_servicio', array('placeholder' => 'Consultores servicio')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('ejecutivos_repuestos', 'Ejecutivos repuestos'); ?></th>
								<td><?= $this->Form->input('ejecutivos_repuestos', array('placeholder' => 'Ejecutivos repuestos')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('consultores_repuestos', 'Consultores repuestos'); ?></th>
								<td><?= $this->Form->input('consultores_repuestos', array('placeholder' => 'Consultores repuestos')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('mantenimiento_preventivo', 'Mantenimiento preventivo'); ?></th>
								<td><?= $this->Form->input('mantenimiento_preventivo', array('placeholder' => 'Mantenimiento preventivo')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('latitud', 'Latitud'); ?></th>
								<td><?= $this->Form->input('latitud', array('placeholder' => 'Latitud')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('longitud', 'Longitud'); ?></th>
								<td><?= $this->Form->input('longitud', array('placeholder' => 'Longitud')); ?></td>
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
