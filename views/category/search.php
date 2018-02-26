<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<section class="grid-shop">
    <!-- .grid-shop -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная </a></li>
                    <li class="breadcrumb-item active"><?= $q?> </li>
                </ol>
            </div>
            <?= \app\widgets\FiltrList::widget();?>
            <div class="col-sm-9 col-md-9">
                <div class="grid-spr">
                    <div class="col-sm-6 col-md-6">
                        <h3>Поиск по запросу: <?= Html::encode($q)?></h3>
                    </div>
                </div>
                <?php if(!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <?php $mainImg = $product->getImage();?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <!-- .pro-text -->
                            <div class="pro-text text-center">
                                <!-- .pro-img -->
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>">
                                    <div class="pro-img">
                                        <?= Html::img($product->replace($mainImg->getUrl()), ['alt' => $product->name])?>
                                    </div>
                                </a>
                                <!-- /.pro-img -->
                                <div class="pro-text-outer">  <span><?= $category->name?> </span>
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>">
                                        <h4> <?= $product->name?>  </h4>
                                    </a>
                                    <p class="wk-price">$<?= $product->price?></p>
                                </div>
                                <div class="pro-text-outer">
                                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="add-btn add-to-cart">Добавить в корзину </a>
                                </div>
                            </div>
                            <!-- /.pro-text -->
                        </div>

                    <?php endforeach;?>
                    <div class="clearfix"></div>
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                <?php else :?>
                    <h2>Ничего не найдено...</h2>
                <?php endif;?>

                <div class="col-xs-12">
                    <div class="grid-spr pag">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.grid-shop -->
</section>
