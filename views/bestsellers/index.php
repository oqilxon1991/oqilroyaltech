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
                    <li class="breadcrumb-item"><a href="/">Главная </a></li>
                    <li class="breadcrumb-item active">Товары со скидками! </li>
                </ol>
            </div>
            <?= \app\widgets\FiltrList::widget();?>
            <div class="col-sm-9 col-md-9">
                <div class="grid-spr">
                    <div class="col-sm-6 col-md-6">
                        <h3><?= $category->name?></h3>
                    </div>
                </div>
                <?php if(!empty($sales)): ?>
                    <?php foreach ($sales as $sale): ?>
                        <?php $mainImg = $sale->getImage();?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <!-- .pro-text -->
                            <div class="pro-text text-center">
                                <!-- .pro-img -->
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale->id])?>">
                                    <div class="pro-img">
                                        <?= Html::img($sale->replace($mainImg->getUrl()), ['alt' => $sale->name])?>
                                    </div>
                                </a>
                                <!-- /.pro-img -->
                                <div class="pro-text-outer">  <span><?= $category->name?> </span>
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale->id])?>">
                                        <h4> <?= $sale->name?>  </h4>
                                    </a>
                                    <p class="wk-price">$<?= $sale->price?></p>
                                </div>
                                <div class="pro-text-outer">
                                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $sale->id])?>" data-id="<?= $sale->id?>" class="add-btn add-to-cart">Добавить в корзину </a>
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
                    <h2>Здес товаров пока нет...</h2>
                <?php endif;?>

                <div class="col-xs-12">
                    <div class="grid-spr pag">
                        <!-- .pagetions -->
                        <!--<div class="col-xs-12 col-sm-6 col-md-6 text-left">
                            <ul class="pagination">
                                <li class="active"><a href="#">1 </a></li>
                                <li><a href="#">2 </a></li>
                                <li><a href="#">3 </a></li>
                                <li><a href="#">&raquo; </a></li>
                            </ul>
                        </div>-->
                        <!-- /.pagetions -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.grid-shop -->
</section>
