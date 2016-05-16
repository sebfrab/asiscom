<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\Cropbox;

?>



<div class="testimonio-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype'=>'multipart/form-data'],
]);
    ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <?= $form->field($model, 'persona')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">    
            <?= $form->field($model, 'testimonio')->textarea(['rows' => 6]) ?>
        </div>
        
        <?php
            if(!$model->isNewRecord){
        ?>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <label class="control-label" >Imagen actual</label>
                <image style="display: block;" src="<?= $model->urlImagen(); ?>"/>
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
                                'width' => 120,
                                'height' => 120,
                            ],
                        ],
                    ],
                ]);
            ?> 
        </div>  
    </div>
    
    
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12"> 
            <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
