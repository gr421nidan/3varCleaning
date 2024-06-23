<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reciept $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reciept-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'price_end')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Выписать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
