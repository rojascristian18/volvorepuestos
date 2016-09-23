<div id="header">
	<div class="container visible-md visible-lg visible-sm">
		<div class="row">
			<div class="col-md-4 col-sm-5">
				<div class="logo">
					<a class="link" href="<?= $this->Html->url('/', true); ?>" title="volvo repuestos">
                        <?= $this->Html->image('template/main-logo.jpg', array('alt' => 'volvo repuestos', 'class' => 'img-responsive logo-img')); ?><!--
                        --><div class="logo-text">
                            <span class="logo-texto-1">Bus & Trucks</span>
                            <span class="logo-texto-2">Chile | Repuestos</span>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-md-4 col-sm-2">
			</div>
			<div class="col-md-4 col-sm-5">
				<div class="buscar clearfix">
					<?= $this->Form->create('Producto', array('action' => 'index', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
						<?= $this->Form->input('nombre_buscar', array('class' => 'form-control input-buscar', 'placeholder' => 'Ingrese nombre de un producto')); ?>
						<?= $this->Form->button('<i class="fa fa-search" aria-hidden="true"></i>', array('type' => 'submit', 'escape' => false, 'class' => 'btn btn-buscar')); ?>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('menu'); ?>
</div>
<? 
	if ( ! empty( $this->request->params['named']['srch'] ) ) :
		echo "<script type='text/javascript'>";
		echo "$('#ProductoNombreBuscar').val('" . $this->request->params['named']['srch'] . "');";
		echo "</script> ";
	endif;
?>