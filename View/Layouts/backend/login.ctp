<!DOCTYPE html>
<html lang="es" class="body-full-height">
	<head>
		<title>Volvo | Bus & Trucks</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="noindex">
		<?= $this->Html->meta('favicon.png', '/backend/img/favicon.png', array('type' => 'icon')); ?>
		<?= $this->Html->css(array(
			'/backend/css/theme-dark',
			'/backend/css/custom'
		)); ?>
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->scriptBlock("var fullwebroot = '{$this->Html->url('', true)}';"); ?>
		<?= $this->Html->script(array(
			'/backend/js/plugins/jquery/jquery.min',
			'/backend/js/lockscreen'
		)); ?>
		<?= $this->fetch('meta'); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->fetch('script'); ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-59963242-2', 'auto');
		ga('send', 'pageview');
		</script>
	</head>
    <body>
		<div class="login-container">
			<?= $this->fetch('content'); ?>
        </div>
    </body>
</html>
