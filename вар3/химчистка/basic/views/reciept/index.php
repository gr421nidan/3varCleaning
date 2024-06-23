<?php

use app\models\Reciept;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Квитанции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reciept-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'order_id',
                'value'=>function($models){
                    return $models->getOrder()->one()->type_service;
                }
            ],
            'date',
            'price_end',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reciept $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
