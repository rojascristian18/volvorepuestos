<div id="template-servicios">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenido-servicios">
                <h3>Garantía Volvo</h3>
                <h1>Nuestros Servicios</h1>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <?=
                    $this->Html->link(
                        $this->Html->image('template/').'<div id="titulo">'.$Servicio['Servicio']['nombre'].' <span>></span></div>',
                        $Servicio['Servicio']['link'],
                        array('escape' => false, 'target' => '_blank')                                                        
                        );   
                    ?>
                </div> 
            </div>
        </div>
    </div>
</div>