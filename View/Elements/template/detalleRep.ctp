

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <h1><?= $categoria;?></h1>
    </div> 
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div id="imagen" class="animated">
            <?= $this->Html->image($producto[0]['Producto']['miniatura']['grande']);?>
        </div>    
    </div> 
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

        <div id="caja" class="animated">
            <div class="titulo"><?= $producto[0]['Producto']['nombre'];?></div>
            <div class="descripcion"><h5><?= $producto[0]['Producto']['descripcion'];?></h5></div>
            <div class="descripcion"><?= $producto[0]['Producto']['detalle'];?></div>
            <div class="precio"><?= '$'.number_format($producto[0]['Producto']['precio'], 0, '', '.');?></div>
            <a class="cotizar">cotizar</a>
        </div>     

    </div> 
</div> 


  