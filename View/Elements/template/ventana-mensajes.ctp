 <?php
    /****************************************************************************************************
    Ventana para mensajes
    ****************************************************************************************************/
?>

<div id="wrapper-ventana">

    <div id="ventana">

        <p id="mensaje"></p>

        <div id="btn-cerrar">
            <a class="link" id="btn-cerrar-ventana" onclick="VentanaMensaje_CerrarVentana ();">Aceptar</a>
        </div>

        <input type="text" id="focus-ventana" />

    </div>
    
</div>

<script type="text/javascript">

    $("div#wrapper-ventana").keypress(function (e) {

        if (e.which == 13) {
            VentanaMensaje_CerrarVentana ();
        }

    });

</script>