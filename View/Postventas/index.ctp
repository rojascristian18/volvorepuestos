<?= $this->element('/template/breadcrumbs'); ?>
<div id="postventa">

    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" >
                
                <?= $this->element('/template/filtros/filtrosleft-postventa'); ?>
                
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" >

                <div id="contenido-postventa">                     
                    <?= $this->element('/template/postventa');?>
                </div>
            </div> 
        </div>      
    </div>

</div>