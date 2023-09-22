<?php

use backend\models\Apples;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */
/** @var backend\models\ApplesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Яблоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apples-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить яблоко', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Сгенерировать яблоки', ['generate'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'color.name',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'fall_at',
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            'status.name',
            'percent_eat:percent',
            'state.name',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Apples $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{fall}{eat}',
                'buttons' => [
                    'fall' => function ($url, $model) {
                        if ($model->canFall()) {
                            return Html::a('Упасть', ['fall', 'id' => $model->id], ['class' => 'btn btn-success']);
                        }
                        else {
                            return 'Падение недоступно';
                        }

                    },
                    'eat' => function ($url, $model) {
                        if ($model->canEat()) {
                            return Html::a('Откусить', '#', ['class' => 'btn btn-success btn-eat', 'data-id' => $model->id]);
                        }  else {
                            return 'Нельзя съесть';
                        }

                    },

                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php
Modal::begin([
    'id' =>'modal_eat',
    'title' => '<h3>Съесть</h3>',
]);

echo Html::label('Откусили (%)', 'model_percent', ['class' => 'control-label']);
echo Html::input('hidden', 'model_id', '', ['id' => 'model_id']);
echo Html::input('text', 'model_percent', '', ['id' => 'model_percent', 'class' => 'form-control']);
echo '<br>';
echo Html::submitButton('Откусить', ['id' => 'modal_btn_eat', 'class' => 'btn btn-success']);

Modal::end();
?>

<?php
$this->registerJs(<<<JS
    
    $('.btn-eat').on('click', function () {
        $('#model_id').val($(this).data('id'))
        $('#model_percent').val(0)
        
        $('#modal_eat').modal('show')
    })
    
    $('#modal_btn_eat').on('click', function () {
        $.ajax({
            url: "/apples/eat",
            method: 'POST',
            dataType: 'text',
            async: false,
            data: {
                id: $('#model_id').val(),
                percent: $('#model_percent').val()
            },
            success: function(result) {
                $('#modal_eat').modal('hide')
            }
        });
        
        return false;
    })

JS
);
