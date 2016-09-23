<div class="menu-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<div class="logo visible-xs">
							<a class="link" href="<?= $this->Html->url('/', true); ?>" title="volvo repuestos">
		                        <?= $this->Html->image('template/main-logo.jpg', array('alt' => 'volvo repuestos', 'class' => 'img-responsive logo-img')); ?><!--
		                        --><div class="logo-text">
		                            <span class="logo-texto-1">Bus & Trucks</span>
		                            <span class="logo-texto-2">Chile | Repuestos</span>
		                        </div>
		                    </a>
						</div>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="menu-principal">
						<ul class="nav navbar-nav">
							<li class="<?= ($this->Html->menuActivo(array('controller' => 'categorias')) ? 'active' : ''); ?>">
								<?= $this->Html->link( 'Home', array('controller' => 'categorias', 'action' => 'index'), array('escape' => false) ); ?>
							</li>
							<li class="dropdown custom-dropdown <?= ($this->Html->menuActivo(array('controller' => 'productos')) ? 'active' : ''); ?>">
								<?= $this->Html->link(
	                                    'Catálogo',
	                                    array(),
	                                    array( 'class'=> 'dropdown-toggle',
	                                           'data-toggle' => 'dropdown',
	                                           'role' => 'button',
	                                           'aria-haspopup' => 'true',
	                                           'aria-expanded' => false,
	                                           'escape' => false,
	                                    )
	                                ); 
	                            ?> 
								<ul class="dropdown-menu submenu clearfix">
									<div class="col-md-8 col-sm-8 col-xs-12">
									<? foreach ( $categoriasMenu as $categoria ) : ?>
										<div class="item-cat">
										<?= $this->Html->link(
											$this->Html->image($categoria['Categoria']['imagen']['mini']) . "<h4 class='cat-title'>" . h($categoria['Categoria']['nombre']) . "</h4>",
											array('controller' => 'productos', 'action' => 'index', 'slug' => $categoria['Categoria']['slug']),
											array('escape' => false, 'class' => 'link')
										); ?>
										</div>
									<? endforeach; ?>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="lateral">
		                                        <?= $this->Html->link(
		                                                '> ver todos los repuestos',
		                                                array('controller' => 'productos', 'action' => 'index'),
		                                                array('escape' => false)
		                                            );
		                                        ?> 
		                                        <?= $this->Html->link(
		                                                '> de menor a mayor precio',
		                                                array('controller' => 'productos', 'action' => 'index', 'sort' => 'precio', 'direction' => 'asc'),
		                                                array('escape' => false)
		                                            );
		                                        ?> 
		                                        <?= $this->Html->link(
		                                                '> de mayor a menor precio',
		                                                array('controller' => 'productos', 'action' => 'index', 'sort' => 'precio', 'direction' => 'desc'),
		                                                array('escape' => false)
		                                            );
		                                        ?> 
	                                        </div>
									</div>
								</ul>
							</li>
							<li class="<?= ($this->Html->menuActivo(array('controller' => 'concesionarios')) ? 'active' : ''); ?>">
	                            <?=
	                                $this->Html->link( 
	                                    'Concesionarios',
	                                    array('controller' => 'concesionarios', 'action' => 'index'),
	                                    array('escape' => false)
	                                );
	                            ?>
	                        </li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
</div>