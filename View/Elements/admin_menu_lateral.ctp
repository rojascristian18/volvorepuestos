<div class="page-sidebar">
	<ul class="x-navigation x-navigation-custom">
		<li class="xn-logo">
			<?= $this->Html->link(
				'<span class="fa fa-dashboard"></span> <span class="x-navigation-control">Backend</span>',
				'/admin',
				array('escape' => false)
			); ?>
			<a href="#" class="x-navigation-control"></a>
		</li>
		<li class="xn-title">Repuestos</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'productos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-cogs"></span> <span class="xn-text">Repuestos</span>',
				array('controller' => 'productos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'categorias', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-list"></span> <span class="xn-text">Categorías</span>',
				array('controller' => 'categorias', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'modelos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-car"></span> <span class="xn-text">Modelos</span>',
				array('controller' => 'modelos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'versiones', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-car"></span> <span class="xn-text">Versiones</span>',
				array('controller' => 'versiones', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>

		<li class="xn-title">Banners</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'banners', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-picture-o"></span> <span class="xn-text">Banners</span>',
				array('controller' => 'banners', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'banner_categorias', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-list"></span> <span class="xn-text">Categorías</span>',
				array('controller' => 'banner_categorias', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>

		<li class="xn-title">Concesionarios</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'concesionarios', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-building"></span> <span class="xn-text">Concesionarios</span>',
				array('controller' => 'concesionarios', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>

		<li class="xn-title">Administradores</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'administradores', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-user"></span> <span class="xn-text">Administradores</span>',
				array('controller' => 'administradores', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
	</ul>
</div>
