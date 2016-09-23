
<?php 

    foreach ($ListaCategorias as $categoria) {
        if($categoria['Categoria']['slug']!='catalogo'){
?>      

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?= $this->Html->link(
                    $this->Html->image($categoria['Categoria']['icono_normal']['mini']).'<div id="caja" class="animated"><div class="titulo">'.$categoria['Categoria']['nombre'].'</div> <button type="submit" class="animated btn btn-default">VER TODOS</button></div>',
                    array('controller' => 'productos', 'action' => 'view', $categoria['Categoria']['slug']),                    
                    array('escape' => false)                                                         
                );   

            ?>
            </div> 
<?
        } 
    }

?>
