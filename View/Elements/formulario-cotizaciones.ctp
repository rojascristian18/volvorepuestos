<div id="wrapper-formulario" class="clearfix">
    <div id="titulo-formulario" class="text-center">
        <a class="link animated" title="Cotice Aquí" > COTIZA TUS REPUESTOS </a>
        <a class="link animated tel" href="tel:227059817">(2) 2705-9817</a>
    </div>

    <div id="contenedor-formulario" class="active">

        <div role="form" class="form">

            <?= $this->Form->create('Lead', array('controller' =>'leads', 'action'=>'lead', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                
                <!-- nombre -->
                <div class="form-group">
                    <?= $this->Form->input('nombre', array('class' => 'form-control', 'placeholder' => 'Nombre', 'required')); ?>
                    <div class="break"></div>
                </div>

                <!-- email -->
                <div class="form-group">
                    <?= $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'E-Mail', 'required')); ?>
                    <div class="break"></div>
                </div>

                <!-- teléfono -->
                <div class="form-group">
                    <?= $this->Form->input('telefono', array('class' => 'form-control', 'placeholder' => 'Teléfono', 'required')); ?>
                    <div class="break"></div>
                </div> 
                <!-- comuna -->
                <div class="form-group">
                    <?= $this->Form->input('region', array(
                        'data-tipo'   => 'region',
                        'options'   => $ListaRegiones,
                        'multiple'    => false,
                        'class'     => 'form-control',
                        'empty'     => 'Selecciona región',
                        'required'
                      )
                    ); ?>                      
                    <div class="break"></div>
                </div>
                <!-- Modelo -->
                <div class="form-group">

                    <?= $this->Form->input('modelo', array(
                        'data-tipo'   => 'modelo',
                        'options'   => $ListaModelos,
                        'multiple'    => false,
                        'class'     => 'form-control',
                        'empty'     => 'Selecciona modelo camión',
                        'required'
                      )
                    ); ?> 
                    <div class="break"></div>
                </div>
                 <!-- Repuesto -->
                <div class="form-group">
                    <?= $this->Form->input('repuesto', array('class' => 'form-control tagsinput', 'placeholder' => 'Repuesto')); ?>
                    <div class="break"></div>
                </div>

                
                <div class="form-group">
                    <?= $this->Form->input('mensaje', array('class' => 'form-control', 'placeholder' => 'Mensaje', 'type' => 'textarea', 'required')); ?>
                </div>
                
                <div class="contenedor-btn-enviar">

                    <?= $this->Form->input('origen', array('class' => 'hidden')); ?>
                    
                    <button type="submit" class="animated btn btn-default">ENVIAR</button>

                </div>

            <?= $this->Form->end(); ?>
            
            <?=$this->element('alerta_formulario');?>

            
        </div>

    </div>

</div> 