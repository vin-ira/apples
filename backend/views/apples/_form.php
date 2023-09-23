<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Colors;
use backend\models\Statuses;
use backend\models\States;

use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var backend\models\Apples $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apples-form">

    <?php
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'color_id')->dropDownList(
        Colors::getColorList()
    ) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'fall_at')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        Statuses::find()->select(['name', 'id'])->indexBy('id')->column()
    ) ?>

    <?= $form->field($model, 'size_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->dropDownList(
        States::find()->select(['name', 'id'])->indexBy('id')->column()
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end(); ?>

</div>
