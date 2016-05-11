<?php
    use yii\helpers\Html;

    $this->title = 'Áreas de práctica';
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="row" style="margin-right: 0px !important;">
    <div class="row" id="nosotros">
        
        <div class="col-lg-12" style="margin-bottom: 30px;">
            <h3>Nuestras</h3>
            <h2>Áreas</h2>
        </div>
        
        <div class="container">
            <?php
                foreach($areas as $area){
            ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px;">
                    <image class="img-responsive" style="width: 100%;" 
                           src="<?php Yii::$app->homeUrl?>/images/areas/<?= $area->idservicio ?>.jpg" />
                    <div style="margin-top: 20px;">
                        <h3><?= $area->nombre ?></h3>
                        <p style="height: 110px;"> <?= $area->resumen ?></p>
                        
                        <button class="btn btn-primary button-gold-ver-mas">Ver más</button>
                    </div>    
                        
                    
                </div>
            <?php
                }
            ?>    
        </div>
        
    </div>
</div>