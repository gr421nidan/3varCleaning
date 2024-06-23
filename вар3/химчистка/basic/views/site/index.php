<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Химчистка!</h1>

        <p>
            <?php if (Yii::$app->user->isGuest): ?>
                <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['site/login']) ?>">Оставить заявку</a>
            <?php else: ?>
                <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['order/create']) ?>">Оставить заявку</a>
            <?php endif; ?>
        </p>
    </div>
</div>
