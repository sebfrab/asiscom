<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Abogado */

$this->title = 'Actualizar Abogado: ' . ' ' . $model->idabogado;
$this->params['breadcrumbs'][] = ['label' => 'Abogados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idabogado, 'url' => ['view', 'idabogado' => $model->idabogado, 'estado_idestado' => $model->estado_idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="abogado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
