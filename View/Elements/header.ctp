<div id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<a class="link animated" href="<?= $this->Html->url('/', true); ?>" title="volvo repuestos">
                        <?= $this->Html->image('template/main-logo.jpg', array('alt' => 'volvo repuestos')); ?>
                        <div class="logo-text">
                            <span class="logo-texto-1">Bus & Trucks</span>
                            <span class="logo-texto-2">Chile | Repuestos</span>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-md-5">
			</div>
			<div class="col-md-4">
				<div class="buscar">
					<?= $this->Form->create('Producto', array('action' => 'busqueda', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
						<?= $this->Form->input('nombre', array('class' => 'form-control')); ?>
						<?= $this->Form->button('<i class="fa fa-search" aria-hidden="true"></i>', array('type' => 'submit', 'escape' => false, 'class' => 'btn')); ?>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>