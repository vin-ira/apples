<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Supprodcnt $model */

$this->title = 'Create Supprodcnt';
$this->params['breadcrumbs'][] = ['label' => 'Supprodcnts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supprodcnt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
