<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\Cropbox;

/* @var $this yii\web\View */
/* @var $model common\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype'=>'multipart/form-data'],
        ]);
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    
    <div class="row">
        <?php
            if(!$model->isNewRecord){
        ?>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <label class="control-label" >Imagen actual</label>
                <image style="display: block;" class="img-responsive" src="<?= $model->urlImagen(); ?>"/>
            </div>
        <?php
            }
        ?>
        
        <div class="col-lg-4 col-md-12 col-sm-12">
            <?php
                echo $form->field($model, 'image')->widget(Cropbox::className(), [
                    'attributeCropInfo' => 'crop_info',
                    'optionsCropbox' => [
                        'boxWidth' => 200,
                        'boxHeight' => 200,
                        'cropSettings' => [
                            [
                                'width' => 150,
                                'height' => 150,
                            ],
                        ],
                    ],
                ]);
            ?> 
        </div>  
        
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
