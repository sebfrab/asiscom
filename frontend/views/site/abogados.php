<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Abogados';
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="row" style="margin-right: 0px !important;">
    <div class="row" id="nosotros">
        <div>
            <div class="col-lg-12" style="margin-bottom: 30px;">
                <h3>Nuestros Abogados</h3>
                <h2>Tenemos a los mejores</h2>
            </div>
            <div class="container">
                <div class="row">
                    <p style="font-style: italic; text-align: center;">"Juro desempeñar leal y horadamente la profesión de abogado(a)"</p>
                    <br/><br/>
                    <?php
                        foreach($abogados as $abogado){
                    ?>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 abogado">
                                <div class="gray" style="padding-bottom: 5px;">
                                    <image class="img-responsive" style="width: 100%;"
                                           src="<?= $abogado->urlImagen(); ?>" />
                                    <div style="margin-top: 20px;">
                                        <h4 class="abogado_nombre"><?= $abogado->nombres." ".$abogado->apellidos ?></h4>
                                        <br/>
                                        <h4 class="abogado_areas">Areas de práctica</h4>
                                        <p style="height: 50px;" class="abogado_areas_detalle"> 
                                        <?php
                                            foreach($abogado->abogadoServicios as $servicio_abogado){
                                        ?>
                                            <?= $servicio_abogado->servicio->nombre." - " ?>
                                        <?php
                                            }
                                        ?>
                                        </p>   
                                        <div style="padding: 10px;">
                                            <div class="abogado_contenedor_contacto">
                                                <p class="abogado_contacto">
                                                    Contacto: <?= $abogado->contacto?>
                                                </p>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>   
            </div>

        </div>
    </div>
</div>
