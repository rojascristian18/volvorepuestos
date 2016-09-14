<div class="filtro">
	<?= $this->Form->create('Producto', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
		<div class="row">
			<div class="col-sm-4">
				<h3>Filtrar productos</h3>
			</div>
			<div class="col-sm-4">
				<?= $this->Form->label('modelo_id', 'Por modelo'); ?>
				<?= $this->Form->input('modelo_id', array('options' => $busqueda['modelos'], 'empty' => '-- Seleccione modelo')); ?>
			</div>
			<div class="col-sm-4">
				<?= $this->Form->submit('Buscar'); ?>
			</div>
		</div>
	<?= $this->Form->end(); ?>
</div>
