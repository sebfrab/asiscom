<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonio */

$this->title = 'Actualizar Testimonio: ' . ' ' . $model->idtestimonio;
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtestimonio, 'url' => ['view', 'idtestimonio' => $model->idtestimonio, 'estado_idestado' => $model->estado_idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testimonio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
