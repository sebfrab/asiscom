<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="shortcut Icon" href="./images/iconos/asiscom.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $url = "./images/logo-2.png";
    NavBar::begin([
        'brandLabel' => '<img id="img-superior" src="'.$url.'">',
        'brandOptions' => ['style' => 'margin-top: -20px;'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top nav-superior-transparent',
            'id' => 'menu-principal',
        ],
    ]);
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Nuestro Estudio', 'url' => ['/site/about']],
        ['label' => 'Abogados', 'url' => ['/site/about']],
        ['label' => 'Áreas de práctica', 'url' => ['/site/about']],
        ['label' => 'Blog', 'url' => 'http://asiscomchilelimitada.blogspot.cl/', 
            'linkOptions' => ['target' => '_blank']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid" style="padding: 0px;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="row">
                <image src="<?php Yii::$app->homeUrl?>/images/logo_dark.png" class="img-responsive col-lg-8 col-md-10 col-sm-12" />
                <div class="col-lg-2 col-md-10"></div>
                <p class="col-lg-12" style="margin-top: 20px;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor
                </p>
            </div>
            <div class="row hidden-xs" style="margin-top: 10px;">
                <h2 class="col-lg-12">Saber mas de nosotros >> </h2>
                <div class="col-lg-12">
                    <a target="_blank" href="https://www.facebook.com/asiscom.ltda" id="facebook"><image src="<?php Yii::$app->homeUrl?>/images/facebook.png" /></a>
                </div>
                
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
            <h1>Enlaces rápidos</h1>
            <ul>
                <li><a href="http://www.bcn.cl/" target="_blank">Biblioteca del Congreso Nacional de Chile</a></li>
                <li><a href="http://www.fiscaliadechile.cl/Fiscalia/index.do" target="_blank">Ministerio Público (Fiscalía)</a></li>
                <li><a href="http://www.pjud.cl/" target="_blank">Poder Judicial de Chile</a></li>
                <li><a href="http://home.sii.cl/" target="_blank">Servicio de Impuestos Internos</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h1>Contactos</h1>
            <p>
                <span class="glyphicon glyphicon-map-marker dorado"></span> 
                Esmeralda N° 1074, Of. 307, Valparaíso
            </p>
            <p>
                <span class="glyphicon glyphicon-earphone dorado"></span> 
                (+569) 90897856
            </p>
            <p>
                <span class="glyphicon glyphicon-envelope dorado"></span> 
                asiscom1@asiscom.cl
            </p>
            
            <p>
                <span class="glyphicon glyphicon-globe dorado"></span> 
                http://asiscomchilelimitada.blogspot.cl/
            </p>
            
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>