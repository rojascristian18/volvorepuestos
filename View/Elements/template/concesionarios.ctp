
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                

                <h1>¿Como te podemos ayudar?</h1>
                <?= $this->Html->image('template/concesionario.jpg', array('alt' => 'concesionarios', 'class'=>'img-responsive'));                ?>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p>
                        Creemos que la mejor manera de garantizar la más rápida asistencia a quienes transportan bienes y personas todos los días, es a través de una sólida y bien localizada red de concesionarios. 
                        Nuestra red está presente en toda América. Son más de 120 puntos de atención estratégicamente distribuidos, para la atención a camiones y buses. Pero no es solo eso.
                    </p>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p>
                        La Red de concesionarios Volvo está en continua expansión.                         
                        Solo así podemos ajustarnos a las exigencias de un mercado en constante evolución.

                        Verifique cuales son los Concesionarios Volvo más próximos a su empresa, y al desplazamiento de su flota.                       
                    </p>
                </div>

            </div> 
   
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                

                
                <h1>Concesionarios</h1>

                <?php  

                    foreach ($ListaConcesionarios as $concesionario) {

                    $titulo         = $concesionario['Concesionario']['nombre'];
                    $descripcion    = $concesionario['Concesionario']['descripcion'];
                    $link           = $concesionario['Concesionario']['link'];

                        echo "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>";
                            if($link!=""){echo "<a href='".$link."' target='_blank'>";}                        
                                echo '<h2>'.$titulo.'</h2>';
                                echo '<p><span>>> </span>'.$descripcion.'</p>';
                            if($link!=""){echo "</a>";}
                        echo "</div>";  

                

                    }

                ?>

         </div> 


