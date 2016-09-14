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
			'bootstrap.min', 'sitio'
		)); ?>
		<?= $this->Html->scriptBlock(sprintf("var webroot = '%s';", $this->webroot)); ?>
		<?= $this->Html->scriptBlock(sprintf("var fullwebroot = '%s';", $this->Html->url('/', true))); ?>
		<?= $this->Html->script(array(
			//'jquery-1.11.3.min', 'bootstrap.min'
		)); ?>
		<?= $this->fetch('meta'); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
		<div class="container">
			<div id="header">
				<div class="top">
					<div class="row">
						<div class="col-sm-6">logo</div>
						<div class="col-sm-6">buscador</div>
					</div>
				</div>
				<div class="menu">
					menu
				</div>
			</div>
			<div id="banners">
				<div class="row">
					<div class="col-sm-8">banner</div>
					<div class="col-sm-4">formulario</div>
				</div>
			</div>
			<?= $this->fetch('content'); ?>
		</div>
	</body>
</html>
