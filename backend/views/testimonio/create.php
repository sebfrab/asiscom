<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Testimonio */

$this->title = 'Nuevo Testimonio';
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
