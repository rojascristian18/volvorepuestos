
<?php 

    $PrimeraCategoria = true;

    foreach ($ListaCategorias as $categoria) {
        if($categoria['Categoria']['slug']!='catalogo'){
?>      

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?= $this->Html->link(
                    $this->Html->image($categoria['Categoria']['icono_normal']['mini']).'<div id="titulo" class="animated"><span>'.$categoria['Categoria']['nombre'].'</span></br>> ver todos</div>',
                    array('controller' => 'productos', 'action' => 'view', $categoria['Categoria']['slug']),                    
                    array('escape' => false)                                                         
                );   

            ?>
            </div> 
<?
        }else{

?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?= $this->Html->link(
                $this->Html->image($categoria['Categoria']['icono_normal']['mini']).'<div id="titulo" class="animated"><span>'.$categoria['Categoria']['nombre'].'</span></br>> ver todos</div>',
                array('controller' => 'productos', 'action' => 'index'),
                array('escape' => false, 'class' => 'animated')                                                         
                );   

            ?>
            </div> 
<?


        }
    }

?>
