<div id="alertas-form">

	<? if ( $flashForm = $this->Session->flash('flashform') ) : ?>
		<div class="alert alert-info">
			<a class="close" data-dismiss="alert">&times;</a>
			<?= $flashForm; ?>
		</div>
	<? endif; ?>

	<? if ( $dangerForm = $this->Session->flash('dangerform') ) : ?>
		<div class="alert alert-danger">
			<a class="close" data-dismiss="alert">&times;</a>
			<?= $dangerForm; ?>
		</div>
	<? endif; ?>

	<? if ( $successForm = $this->Session->flash('successform') ) : ?>
		<div class="alert alert-success">
			<a class="close" data-dismiss="alert">&times;</a>
			<?= $successForm; ?>
		</div>
	<? endif; ?>	
</div>
