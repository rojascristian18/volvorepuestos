<?= $this->element('template/breadcrumbs'); ?>
<div id="concesionarios">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" >
                
                <?= $this->element('/template/filtros/filtrosleft-concecionarios'); ?>
                
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" >
                <div id="detalle-concesionario">
                    <? if (!empty($concesionario['Concesionario']['nombre'])) : ?>
                        <h1><?=nl2br($concesionario['Concesionario']['nombre']);?></h1>
                    <? endif;?>

                    <table class="table">
                        <? if (!empty($concesionario['Concesionario']['direccion'])) : ?>
                            <tr>
                                <td><b>Dirección: </b></td>
                                <td><?=nl2br($concesionario['Concesionario']['direccion']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Comuna']['nombre'])) : ?>
                            <tr>
                                <td><b>Comuna:</b></td>
                                <td><?=nl2br($concesionario['Comuna']['nombre']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['horario'])) : ?>
                            <tr>
                                <td><b>Horarios:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['horario']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['gerente_sucursal'])) : ?>
                            <tr>
                                <td><b>Gerente de Sucursal:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['gerente_sucursal']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['consultores_servicio'])) : ?>
                            <tr>
                                <td><b>Consultores de Servicios:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['consultores_servicio']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['ejecutivos_repuestos'])) : ?>
                            <tr>
                                <td><b>Ejecutivos de Repuestos:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['ejecutivos_repuestos']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['consultores_repuestos'])) : ?>
                            <tr>
                                <td><b>Consultores de Repuestos:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['consultores_repuestos']);?></td>
                            </tr>
                        <? endif;?>

                        <? if (!empty($concesionario['Concesionario']['mantenimiento_preventivo'])) : ?>
                            <tr>
                                <td><b>Mantenimiento Preventivo:</b></td>
                                <td><?=nl2br($concesionario['Concesionario']['mantenimiento_preventivo']);?></td>
                            </tr>
                        <? endif;?>
                    </table>               
                </div>
            </div>        
        </div>
    </div>
</div>