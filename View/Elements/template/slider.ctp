                    <div class="carousel slide" data-ride="carousel" id="contenido-slider">

                        <div class="carousel-inner" role="listbox">

                            <?php


                                $i = 0;

                                foreach ($ListaBanners as $banner) {

                                    $i++;

                                    if ($i == 1) {
                                        echo "<div class='item active'>";
                                    }
                                    else {
                                        echo "<div class='item'>";
                                    }

                                    echo $this->Html->image($banner['img'], array('alt' => $banner['alt'], 'class'=>'img-responsive'));

                                    echo "</div>";
                                    //break;
                                }

                            ?>

                        </div>

                        <?php
                            if (count($ListaBanners) > 1) {
                        ?>

                            <a id="btn-prev" class="left carousel-control link animated" onclick="$('div#contenido-slider').carousel('prev');" data-slide="prev" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a id="btn-next" class="right carousel-control link animated" onclick="$('div#contenido-slider').carousel('next');" data-slide="next" role="button">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        <?php
                            }
                        ?>

                    </div>