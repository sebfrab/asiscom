<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Servicio */

$this->title = 'Update Servicio: ' . ' ' . $model->idservicio;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idservicio, 'url' => ['view', 'id' => $model->idservicio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
