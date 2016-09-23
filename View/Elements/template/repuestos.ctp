

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
        <h1><?= $categoria;?></h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="text-right">
            <ul class="pagination">

                <?
                    if(isset($categoria)){
                        $this->Paginator->options(array('url' => array('controller' => 'productos', 'action' => 'view', $categoria) + $pass));
                    }
                ?>

                <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i>', array('tag' => 'li','escape' => false), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'first disabled hidden')); ?>
                <?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 1, 'currentClass' => 'active', 'separator' => '')); ?>
                <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>', array('tag' => 'li','escape' => false), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden','escape' => false)); ?>
            </ul>
        </div>
    </div>
</div>


<div class="row">

        <?php

            foreach ($ListaProducto as $producto) {
                if($producto['Producto']['slug']!='catalogos'){
        ?>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <?= $this->Html->link(
                            $this->Html->image($producto['Producto']['miniatura']['mini']).'<div id="caja" class="animated"><div class="titulo">'.$producto['Producto']['nombre'].'</div><div class="descripcion">'.$producto['Producto']['descripcion'].'</div><div class="precio">$'.number_format($producto['Producto']['precio'], 0, '', '.').'</div></div>',
                            array('controller' => 'productos', 'action' => 'detalle', $categoria, $producto['Producto']['slug']),
                            array('escape' => false)
                        );

                    ?>





                    </div>
        <?
                }
            }

        ?>

</div>

<div class="row">
    <div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
        <div class="text-right">
            <ul class="pagination">

                <?
                    if(isset($categoria)){
                        $this->Paginator->options(array('url' => array('controller' => 'productos', 'action' => 'view', $categoria) + $pass));
                    }
                ?>

                <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i>', array('tag' => 'li','escape' => false), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'first disabled hidden')); ?>
                <?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 1, 'currentClass' => 'active', 'separator' => '')); ?>
                <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>', array('tag' => 'li','escape' => false), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden','escape' => false)); ?>
            </ul>
        </div>
    </div>
</div>