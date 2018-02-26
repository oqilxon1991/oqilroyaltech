<?php

use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.02.2018
 * Time: 19:38
 */
?>
<div class="col-xs-12 col-sm-6 col-md-4">
    <!-- .pro-text -->
    <div class="pro-text text-center">
        <!-- .pro-img -->
        <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $model->id])?>">
            <div class="pro-img">
                <?= Html::img($model->replace($mainImg->getUrl()), ['alt' => $model->name])?>
            </div>
        </a>
        <!-- /.pro-img -->
        <div class="pro-text-outer">  <span><?= $model->name?> </span>
            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $model->id])?>">
                <h4> <?= $model->name?>  </h4>
            </a>
            <p class="wk-price">$<?= $model->price?></p>
        </div>
        <div class="pro-text-outer">
            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>" data-id="<?= $model->id?>" class="add-btn add-to-cart">Добавить в корзину </a>
        </div>
    </div>
    <!-- /.pro-text -->
</div>
