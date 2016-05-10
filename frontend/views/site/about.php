<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Nuestro Estudio';
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="row" style="margin-right: 0px !important;">
    <div class="row" id="nosotros">
        <div>
            <div class="col-lg-12" style="margin-bottom: 30px;">
                <h3>Sobre</h3>
                <h2>Nuestro Estudio</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-8">
                        <p>
                            <?= $nuestro_estudio->dato ?>
                        </p>

                    </div>
                    <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
                    <a href="#" title="ver equipo de trabajo" ><image src="<?php Yii::$app->homeUrl?>/images/mantenible/team2.jpg"  class="col-lg-5 col-md-4 col-sm-4 img-responsive thumbnail"/></a>
                </div>    

            </div>

        </div>
    </div>
    
    <div class="row" id="nosotros">
        <div>
            <div class="col-lg-12" style="margin-bottom: 30px;">
                <h3>Nuestra</h3>
                <h2>Misión y Visión</h2>
            </div>
            <div class="container">
                <div class="row">
                    
                    <a href="#" title="Dama Ciega" ><image src="<?php Yii::$app->homeUrl?>/images/mission-vision-right.jpg"  
                                                           class="col-lg-3 col-md-4 col-sm-4 img-responsive"/></a>
                    
                    <div class="col-lg-9 col-md-8 col-sm-8">
                        <p>
                            <b>Misión </b>: 
                            <?= $mision->dato ?>    
                        </p>

                        <p>
                            <br/>
                            <b>Visión </b>: 
                            <?= $vision->dato ?>   
                        </p>
                    </div>
                    
                </div>    

            </div>

        </div>
    </div>
</div>