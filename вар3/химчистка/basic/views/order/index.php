<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget(['dataProvider' => $dataProvider,
        'columns' => [['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->username;
                },
            ],
            'type_service',
            'status',
            'price',
            'data',
            ['format' => 'raw',
                'value' => function ($model) {
                    if (Yii::$app->user->identity->isAdmin()) {
                        return Html::a('Выписать квитанцию', ['reciept/create', 'id' => $model->id], [
                            'class' => 'btn btn-primary',
                        ]);
                    } else {
                        return Html::a('Редактировать', ['order/view', 'id' => $model->id], [
                            'class' => 'btn btn-primary',
                        ]);
                    }
                }
            ],
        ]
    ]); ?>


</div>
