<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\supprodcnt $model */

$this->title = 'Update Supprodcnt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Supprodcnts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supprodcnt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
