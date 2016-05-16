<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abogados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abogado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Abogado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombres',
            'apellidos',
            'contacto',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
