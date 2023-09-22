<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Apples $model */

$this->title = 'Изменение яблока: ' . $model->id . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Яблоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="apples-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
