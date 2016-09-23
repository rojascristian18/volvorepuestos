<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Volvo | Bus & Trucks</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<?= $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon')); ?>
		<?= $this->Html->css(array(
			'bootstrap.min',
			'sitio'
		)); ?>
		<?= $this->Html->scriptBlock(sprintf("var webroot = '%s';", $this->webroot)); ?>
		<?= $this->Html->scriptBlock(sprintf("var fullwebroot = '%s';", $this->Html->url('/', true))); ?>
		<?= $this->Html->script(array(
			'jquery-1.11.3.min', 
			'bootstrap.min',
			'tagsinput/jquery.tagsinput.min',
			'jquery.maskedinput.min',
			'jquery.alphanumeric.pack',
			'jquery.validate.min',
			'app',
		)); ?>
		<?= $this->fetch('meta'); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
		
		<?= $this->element('header'); ?>
		
		<div id="hero">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12 no-right-pad">
						<?= $this->element('slider'); ?>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 no-left-pad">
						<?= $this->element('formulario-cotizaciones'); ?>
					</div>
				</div>
			</div>
		</div>
		<?= $this->fetch('content'); ?>
		
	
	</body>
</html>
