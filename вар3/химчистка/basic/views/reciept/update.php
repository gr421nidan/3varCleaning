<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reciept $model */

$this->title = 'Update Reciept: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reciepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reciept-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
