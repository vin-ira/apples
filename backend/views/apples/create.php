<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Apples $model */

$this->title = 'Добавить яблоко';
$this->params['breadcrumbs'][] = ['label' => 'Яблоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apples-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
