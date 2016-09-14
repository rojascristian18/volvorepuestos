<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Volvo | Bus & Trucks</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?= $this->Html->meta('favicon.png', '/backend/img/favicon.png', array('type' => 'icon')); ?>
		<?= $this->Html->css(array(
			'/backend/css/theme-dark',
			'/backend/css/custom',
			'/backend/css/icheck/skins/flat/red',
			/*
			'/backend/css/ion/ion.rangeSlider',
			'/backend/css/ion/ion.rangeSlider.skinFlat',
			'/backend/css/cropper/cropper.min.css',
			'/backend/css/jstree/jstree.min'
			*/
		)); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->scriptBlock("var fullwebroot = '{$this->Html->url('', true)}';"); ?>
		<?= $this->Html->script(array(
			'/backend/js/plugins/jquery/jquery.min',
			'/backend/js/plugins/jquery/jquery-ui.min',
			'/backend/js/plugins/bootstrap/bootstrap.min',
			'/backend/js/plugins/bootstrap/bootstrap-select',
			'/backend/js/plugins/bootstrap/bootstrap-datepicker',
			'/backend/js/plugins/icheck/icheck.min',
			'/backend/js/plugins/owl/owl.carousel.min',
			'/backend/js/plugins/morris/raphael-min',
			'/backend/js/plugins/morris/morris.min',
			'/backend/js/plugins/datatables/jquery.dataTables.min',
			'/backend/js/plugins/cookie/js.cookie',
			'/backend/js/sitio',
			'/backend/js/actions'
			/*
			'/backend/js/plugins/bootstrap/bootstrap-datepicker',

			'/backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min',
			'/backend/js/plugins/summernote/summernote',
			'/backend/js/plugins/codemirror/codemirror',
			'/backend/js/plugins/codemirror/mode/sql/sql',

			'/backend/js/plugins',
			//'/backend/js/actions',
			//'/backend/js/demo_sliders',
			//'/backend/js/demo_charts_morris',



			'/backend/js/custom',
			//'/backend/js/demo_dashboard',
			'/backend/js/plugins/ion/ion.rangeSlider.min',
			'/backend/js/plugins/rangeslider/jQAllRangeSliders-min',

			'/js/vendor/bootstrap3-typeahead'
			*/
		)); ?>
		<?= $this->fetch('script'); ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-59963242-2', 'auto');
		<? if ( AuthComponent::user() ) : ?>
		ga('set', 'userId', '<?= AuthComponent::user('email'); ?>');
		<? endif; ?>
		ga('send', 'pageview');
		</script>
	</head>
	<body>
        <div class="page-container">
			<?= $this->element('admin_menu_lateral'); ?>
			<div class="page-content">
				<?= $this->element('admin_menu_superior'); ?>
				<?= $this->element('admin_alertas'); ?>
				<?= $this->fetch('content'); ?>
			</div>
		</div>
		<audio id="audio-alert" src="<?= $this->Html->url('/backend/audio/alert.mp3'); ?>" preload="auto"></audio>
		<audio id="audio-fail" src="<?= $this->Html->url('/backend/audio/fail.mp3'); ?>" preload="auto"></audio>
	</body>
</html>
