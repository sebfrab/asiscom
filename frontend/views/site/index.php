<?php
    use yii\helpers\Url;
    use common\widgets\Alert;
?>

<?php // <editor-fold defaultstate="collapsed" desc="Slider"> ?>
<header id="header">
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">

            <!-- =========================
                Header item 1
            ============================== -->
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php Yii::$app->homeUrl?>/images/slider/2.jpg');">
                </div>
                
                <div class="carousel-caption">
                    <h1 class="title-slide dorado"><strong class="bold-text">ASISCOM</strong> CHILE</h1>
                    <h1 class="sub-title-slide">Estudio Jurídico Financiero</h1>
                    
                    <div class="" style="margin-top: 20px;">
                        <a href="#areas" class="btn btn-transparent light">
                            Nuestros Servicios <br/> 
                            <span class="glyphicon glyphicon-menu-down" style=""></span>
                        </a>
                    </div>    
                    
                </div>
                <div class="overlay"></div>
            </div>

            <!-- =========================
                Header item 2
            ============================== -->
            <div class="item">

                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php Yii::$app->homeUrl?>/images/slider/slider-1.jpg');"></div>
                <div class="carousel-caption">
                    <h1 class="title-slide dorado"><strong class="bold-text">ASISCOM</strong> CHILE</h1>
                    <h1 class="sub-title-slide">Estudio jurídico financiero</h1>
                    
                    <div class="" style="margin-top: 20px;">
                        <a href="#areas" class="btn btn-transparent light">
                            Nuestros Servicios <br/> 
                            <span class="glyphicon glyphicon-menu-down" style=""></span>
                        </a>
                    </div>  
                </div>
                <div class="overlay"></div>
            </div>
        </div> <!-- *** end wrapper *** -->

        <!-- Carousel Controls -->
        <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
            <span class="icon-prev icon-arrow-left"></span>
        </a>
        <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
            <span class="icon-next icon-arrow-right"></span>
        </a>
    </div>
</header> <!-- *** end Header *** -->
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Nosotros"> ?>
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
                    <p style="text-align: right;"><a href="<?= Url::to(['site/about',]); ?>">leer más >></a></p>
                </div>
                <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
                <a href="#" title="ver equipo de trabajo" ><image src="<?php Yii::$app->homeUrl?>/images/mantenible/team2.jpg"  class="col-lg-5 col-md-4 col-sm-4 img-responsive thumbnail"/></a>
            </div>
        </div>
        
    </div>
</div>
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Areas"> ?>
<div id="areas" class="row gray areas">
    <div class="col-lg-12">
        <h3>Destacados</h3>
        <h2>NUESTRO SERVICIOS</h2>
    </div>
    <div class="container">
        <?php
            foreach ($servicios as $servicio){
        ?>
            <div class="col-lg-4 col-md-4 col-sm-12 servicio">
                <a href="<?= Url::to(['site/areas',]); ?>">
                    <p>
                        <span style="height: 100px; float: left; margin-right: 10px;">
                            <image src="<?php Yii::$app->homeUrl?>/images/iconos/<?= $servicio->image ?>" style=""/>
                        </span>
                        <b><?= $servicio->nombre ?></b><br/>
                        <?= $servicio->resumen ?>
                    </p>
                </a>
            </div>
        <?php
            }
        ?>
        
        <p style="text-align: right;"><a class="link" href="<?= Url::to(['site/areas',]); ?>">leer más >></a></p>
    </div>
</div>
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Testimonio"> ?>
<div class="row" id="testimonio">
    <div class="col-lg-12">
        <h2>Testimonio</h2><br/>
    </div>
    
    <div class="col-lg-2 col-md-2"></div>        
    <div class="col-lg-8 col-md-8">
        <?php
            if(!is_null($testimonio)){
        ?>
        <p><image src="<?php Yii::$app->homeUrl?>/images/testimonio/<?= $testimonio->idtestimonio ?>.jpg" class="img-circle"/></p>
        <p>
            " <?= $testimonio->testimonio ?> " <br/>
            
            <label>
                <?= $testimonio->persona ?><br/>
                <span><?= $testimonio->cargo ?></span>
            </label>
                
        </p>
        <?php
            }
        ?>
    </div>
    <div class="col-lg-2 col-md-2"></div> 
</div>
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Empresas"> ?>
<div class="row" id="clientes">
    <div class="col-lg-12">
        <h3>empresas</h3>
        <h2>CLIENTES</h2>
    </div>
    <div class="col-lg-12">
        <div class="container">
            <div class="row">
                <?php
                    if(!is_null($clientes)){
                        foreach($clientes as $cliente){
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <a href="#">
                        <image class="img-responsive col-lg-12 center-block" src="<?php Yii::$app->homeUrl?>/images/cliente/<?= $cliente->idcliente ?>.jpg" />
                        <h3 class="dorado col-lg-12"><?= $cliente->nombre; ?></h3>
                    </a>
                </div>


                <?php
                    }}
                ?>
            </div>
        </div>
        
    </div>
</div>
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Contacto"> ?>
<div class="row gray" id="contacto">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <h2 class="dorado" style="text-align: center">Contáctenos</h2><br/><br/>
        <?=
            $this->render('_contact', [
                'model' => $model,
            ]);
        ?>
        
        <?= Alert::widget(); ?>
    </div>
    <div class="col-lg-2"></div>
</div>
<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="Maps"> ?>
<div class="row embed-container maps" id="mapa">
    <div class="col-lg-12" style="padding-right: 0px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3344.553449626768!2d-71.62707868499764!3d-33.0418932840458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689e12947020d77%3A0xe90c16014056767b!2sEsmeralda+1072%2C+Valpara%C3%ADso%2C+Regi%C3%B3n+de+Valpara%C3%ADso!5e0!3m2!1ses-419!2scl!4v1462299866625" frameborder="0" height="300" width="100%"></iframe>
    </div>
</div>
<?php // </editor-fold> ?>



