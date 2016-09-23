



<div id="template-header">



    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="franja">
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row" >




            <div id="seccion-sup" class="hidden-xs">
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 " id="logos">
                    <a class="link animated" href="<?= $this->Html->url('/', true); ?>" title="volvo repuestos">
                        <?= $this->Html->image('template/main-logo.jpg', array('alt' => 'volvo repuestos')); ?>
                        <div class="logo-text">
                            <span class="logo-texto-1">Bus & Trucks</span>
                            <span class="logo-texto-2">Chile | Repuestos</span>
                        </div>
                    </a>
                </div> 
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right " id="search">
                    <?= $this->Form->create('Producto', array('id' => 'buscadorHeader', 'action' => 'buscar', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
                        <div class="input-group">
                                    <?= $this->Form->input('libre', array(
                                        'data-tipo'     => 'libre',
                                        'value'         => (! empty($filtros['filtro']['buscar']) ? $filtros['filtro']['buscar'] : ''),
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Ingresa el nombre de un producto'
                                    )); ?>                            
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div><!-- /input-group -->

                    <?= $this->Form->end(); ?>
                </div>
            </div>

        </div>
        

        <div class="row">

            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " id="seccion-inf">

                <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?= $this->Html->url('/', true); ?>">
                          
                        <?= $this->Html->image('template/main-logo.jpg', array('alt' => 'volvo repuestos')); ?>
                        <div class="logo-text">
                            <span class="logo-texto-1">Bus & Trucks</span>
                            <span class="logo-texto-2">Chile | Repuestos</span>
                        </div>

                      </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            <? if (isset($tipo)){}else{$tipo='';}?>

                            <li class="animated <?= ($this->Html->menuActivo(array('controller' => 'home')) ? 'active' : ''); ?>">

                                <?=
                                    $this->Html->link(
                                        'Home',
                                        array('controller' => 'home', 'action' => 'index'),
                                        array('escape' => false)
                                    );
                                ?>

                            </li> 
 
                            <li class="dropdown <?= ($this->Html->menuActivo(array('controller' => 'productos')) ? 'active' : ''); ?>">

                                <?=
                                    $this->Html->link(
                                        'Catálogo',
                                        array('controller' => 'home', 'action' => 'index'),
                                        array(  'class'=> 'dropdown-toggle',
                                                'data-toggle' => 'dropdown',
                                                'role' => 'button',
                                                'aria-haspopup' => 'true',
                                                'aria-expanded' => false,
                                                'escape' => false,
                                                )
                                    ); 
                                ?> 

                                  <ul class="dropdown-menu" id="submenu-cat">  
                                    <?php 
                                        foreach ($ListaCategorias as $id => $categoria) {   
                                            if($categoria['Categoria']['slug']!='catalogo'){
                                    ?>
                                            <?=
                                            $this->Html->link($this->Html->image($categoria['Categoria']['icono_normal']['mini']).'<br>'.$categoria['Categoria']['nombre'],
                                                    array('controller' => 'productos', 'action' => 'view', $categoria['Categoria']['slug']),
                                                    array('escape' => false)                                                        
                                                );   
                                            ?> 

                                    <?
                                            }
                                         } ?>


                                            <div class="lateral">
                                            <?=
                                                $this->Html->link(
                                                    '> ver todos los repuestos',
                                                    array('controller' => 'catalogo', 'action' => 'index'),
                                                    array('escape' => false)
                                                );
                                            ?> 
                                            <?=
                                                $this->Html->link(
                                                    '> de menor a mayor precio',
                                                    array('controller' => 'filtro', 'action' => 'index'),
                                                    array('escape' => false)
                                                );
                                            ?> 
                                            <?=
                                                $this->Html->link(
                                                    '> de mayor a menor precio',
                                                    array('controller' => 'categoria', 'action' => 'index'),
                                                    array('escape' => false)
                                                );
                                            ?> 
                                            <?=
                                                $this->Html->link(
                                                    '> ver por modelo de camión',
                                                    array('controller' => 'modelo', 'action' => 'index'),
                                                    array('escape' => false)
                                                );
                                            ?>
                                            </div>
                                  </ul>
                              

                            </li>

                            <li class="animated <?= ($this->Html->menuActivo(array('controller' => 'concesionarios')) ? 'active' : ''); ?>">

                                <?php //$GoogleAnalytics = "ga('send', 'event', 'Menú Principal', 'Neumáticos');" ?>
                                <?=
                                    $this->Html->link( 
                                        'Concesionarios',
                                        array('controller' => 'concesionarios', 'action' => 'index'),
                                        array('escape' => false/*, 'onclick' => $GoogleAnalytics*/)
                                    );
                                ?>
                            </li>
                            <li class="animated <?= ($this->Html->menuActivo(array('controller' => 'postventa')) ? 'active' : ''); ?>">
                                
                                <?=
                                    $this->Html->link(
                                        'Post venta',
                                        array('controller' => 'postventa', 'action' => 'index'),
                                        array('escape' => false)
                                    );
                                ?>

                            </li>
                            

                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>


            </div>
                 
        </div>





    </div>

</div>