<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SupprodcntSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supprodcnt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_s') ?>

    <?= $form->field($model, 'id_p') ?>

    <?= $form->field($model, 'price_min') ?>

    <?= $form->field($model, 'price_sale') ?>

    <?php // echo $form->field($model, 'cnt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
