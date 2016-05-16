<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Abogado */

$this->title = 'Nuevo Abogado';
$this->params['breadcrumbs'][] = ['label' => 'Abogados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abogado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
