

<div id="filtroleft">
    <?= $this->Form->create('Concesionarios', array('id' => 'filtros', 'action' => 'buscar', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
        <div class="form">
            <h2>Concesionarios en Chile</h2>

            <div class="form-group">
                <ul>
                <? 


                    foreach ($ListaConcesionarios as $concesionario) {

                    $titulo         = $concesionario['Concesionario']['nombre'];
                    $link           = $concesionario['Concesionario']['link'];

                        echo "<li><a href='".$link."' target='_blank'><span>&middot; </span>".$titulo."</a></li>";               
                    }


                ?>
                    <li><a></a></li> 
                </ul>

            
            </div>


        </div>
    <?= $this->Form->end(); ?>
</div>