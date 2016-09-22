<div class="filtro">
	<div class="container">
		<?= $this->Form->create('Producto', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
			<div class="row">
				<div class="col-sm-3">
					<h3>Filtrar productos</h3>
				</div>
				<div class="col-sm-3">
					<?= $this->Form->label('categoria_slug', 'Por categoría'); ?>
					<?= $this->Form->input('categoria_slug', array('options' => $slugsCategorias)); ?>
				</div>
				<div class="col-sm-3">
					<?= $this->Form->label('modelo_slug', 'Por modelo'); ?>
					<?= $this->Form->input('modelo_slug', array('options' => $slugsModelos, 'empty' => 'Seleccione modelo')); ?>
				</div>
				<div class="col-sm-3">
					<?= $this->Form->submit('Buscar'); ?>
				</div>
			</div>
		<?= $this->Form->end(); ?>
	</div>
</div>
<? 	
	if ( ! empty( $this->request->params['slug'] ) ) :
		echo "<script type='text/javascript'>";
		echo "$('#ProductoCategoriaSlug').val('" . $this->request->params['slug'] . "');";
		echo "</script> ";
	endif;

	if ( ! empty( $this->request->params['model'] ) ) :
		echo "<script type='text/javascript'>";
		echo "$('#ProductoModeloSlug').val('" . $this->request->params['model'] . "');";
		echo "</script> ";
	endif;


	if ( ! empty( $this->request->params['named']['slug'] ) ) :
		echo "<script type='text/javascript'>";
		echo "$('#ProductoCategoriaSlug').val('" . $this->request->params['named']['slug'] . "');";
		echo "</script> ";
	endif;


	if ( ! empty( $this->request->params['named']['model'] ) ) :
		echo "<script type='text/javascript'>";
		echo "$('#ProductoModeloSlug').val('" . $this->request->params['named']['model'] . "');";
		echo "</script> ";
	endif;

?>
