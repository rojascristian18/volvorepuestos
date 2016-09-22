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
			'jquery.min', 'bootstrap.min', 'app'
		)); ?>
		<?= $this->fetch('meta'); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
		
		<?php echo $this->element('header'); ?>
		
		<?= $this->element('alertas'); ?>
		<?= $this->fetch('content'); ?>
		
	
	</body>
</html>
