<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\supprodcnt $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supprodcnt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_s')->textInput() ?>

    <?= $form->field($model, 'id_p')->textInput() ?>

    <?= $form->field($model, 'price_min')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_sale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
