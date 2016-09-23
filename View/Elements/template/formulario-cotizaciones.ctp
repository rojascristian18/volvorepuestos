<div id="wrapper-formulario">
    <div id="titulo-formulario" class="text-center">
        <a class="link animated" title="Cotice Aquí" > COTIZA TUS REPUESTOS </a>
        <a class="link animated tel" href="tel:227059817">(2) 2705-9817</a>
    </div>

    <div id="contenedor-formulario" class="active">

        <div role="form" class="form">

            <?= $this->Form->create('Lead', array('inputDefaults' => array('label' => false, 'div' => false))); ?>
                
                <!-- nombre -->
                <div class="form-group">
                    <?= $this->Form->input('nombre', array('class' => 'form-control', 'placeholder' => 'Nombre')); ?>
                    <div class="break"></div>
                </div>

                <!-- email -->
                <div class="form-group">
                    <?= $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'E-Mail')); ?>
                    <div class="break"></div>
                </div>

                <!-- teléfono -->
                <div class="form-group">
                    <?= $this->Form->input('telefono', array('class' => 'form-control', 'placeholder' => 'Teléfono')); ?>
                    <div class="break"></div>
                </div> 
                <!-- comuna -->
                <div class="form-group">
                    <?= $this->Form->input('region', array(
                        'data-tipo'   => 'region',
                        'options'   => $ListaRegiones,
                        'multiple'    => false,
                        'class'     => 'form-control',
                        'empty'     => 'Selecciona ciudad'
                      )
                    ); ?>                      
                    <div class="break"></div>
                </div>
                <!-- Repuesto -->
                <div class="form-group">
                    <?= $this->Form->input('repuesto', array('class' => 'form-control', 'placeholder' => 'Tipo de repuesto')); ?>
                    <div class="break"></div>
                </div>
                <!-- Repuesto -->
                <div class="form-group">

                    <?= $this->Form->input('modelo', array(
                        'data-tipo'   => 'modelo',
                        'options'   => $ListaModelos,
                        'multiple'    => false,
                        'class'     => 'form-control',
                        'empty'     => 'Selecciona modelo camión'
                      )
                    ); ?> 
                    <div class="break"></div>
                </div>


                
                <div class="form-group">
                    <?= $this->Form->input('mensaje', array('class' => 'form-control', 'placeholder' => 'Mensaje')); ?>
                </div>
                
                <div class="contenedor-btn-enviar">


                    <button type="submit" class="animated btn btn-default">ENVIAR</button>
                    <?= $this->Form->input('origen', array('class' => 'hidden')); ?>
                    <script>window.onload = function() { document.getElementById('LeadOrigen').value = (location.href.match(/rtrk\.cl/i) !== null ? 'ReachLocal' : 'Orgánico'); }</script>

                </div>

            <?= $this->Form->end(); ?>
            
        </div>

    </div>


</div> 

<?php
    
    if ($FormularioEnviado || $EnvioError || $ErroresFormulario) {

        echo "<script type='text/javascript'>";

        echo "$(document).ready(function() {";

        if ($FormularioEnviado) echo "VentanaMensaje_MostrarVentana ('Su mensaje ha sido enviado exitosamente.');";

        if ($EnvioError) echo "VentanaMensaje_MostrarVentana ('Disculpe. Ha ocurrido un error. Por favor intente nuevamente.');";

        if ($ErroresFormulario) echo "VentanaMensaje_MostrarVentana ('Existen errores en los datos ingresados. Por favor intente nuevamente.');";

        echo "});";

        echo "</script>";

    }



?>