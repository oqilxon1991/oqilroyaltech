<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="grid-shop">
    <!-- .grid-shop -->
    <div class="container">
        <div class="row">
            <?php Pjax::begin(); ?>
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home </a></li>
                    <li class="breadcrumb-item active"><?= $category->name?> </li>
                </ol>
            </div>
            <div class="col-sm-3 col-md-3">
                <?php if (!empty($undercat) ): ?>
                <div class="weight">
                    <div class="title">
                        <h2>Категории </h2>
                    </div>
                    <div class="product-categories">
                        <ul>
                            <?php foreach ($undercat as $ucat): ?>
                                <li><a href="<?= Url::to(['category/view', 'id' => $ucat['id']])?>"><?= $ucat->name;?> <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <?php endif;?>
                <div class="weight">
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <div class="weight">
                    <div class="title">
                        <h2>filter by price </h2>
                    </div>
                    <div class="filter-outer">
                        <h3>Price </h3>
                        <!-- Bootstrap Pricing Slider by ZsharE -->
                        <div class="button-slider">
                            <div class="btn-group">
                                <div class="btn btn-default">
                                    <p>Range:  <strong>$ <span id="sliderValue">100.0 </span></strong> -  <strong>$ <span id="sliderValue2">1.700.00 </span></strong>  </p>
                                    <input id="bootstrap-slider" data-slider-min="1" data-slider-max="1700" data-slider-step="1" data-slider-value="100" type="text" />
                                    <div class="valueLabelblck">Filter </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Bootstrap Pricing Slider by ZsharE -->
                        <div class="brands">
                            <h3>Brands </h3>
                            <ul>
                                <li><a href="#">Black   <span>(10) </span></a></li>
                                <li><a href="#">White    <span>(13) </span></a></li>
                                <li><a href="#">Blue   <span>(05) </span></a></li>
                                <li><a href="#">Red   <span>(87) </span></a></li>
                                <li><a href="#">Screen  <span>(40) </span></a></li>
                            </ul>
                        </div>
                        <div class="color">
                            <h3>Color </h3>
                            <ul>
                                <li><a href="#" class="color-1"><span></span></a></li>
                                <li><a href="#" class="color-2"><span></span></a></li>
                                <li><a href="#" class="color-3"><span></span></a></li>
                                <li><a href="#" class="color-4"><span></span></a></li>
                                <li><a href="#" class="color-5"><span></span></a></li>
                                <li><a href="#" class="color-6"><span></span></a></li>
                                <li><a href="#" class="color-7"><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-9">
                <div class="grid-spr">
                        <div class="col-sm-6 col-md-6">
                            <h3> <?= $category->name?></h3>
                        </div>
                    <div class="col-sm-6 col-md-6 text-right">  <strong>Showing 1-12  <span>of 30 relults </span></strong>  </div>
                </div>

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => function ($model, $key, $index, $widget) { ?>
                        <?php $mainImg = $model->getImage();?>

                        <div class="col-md-4">
                            <!-- .pro-text -->
                            <div class="pro-text text-center">
                                <!-- .pro-img -->
                                <div class="pro-img">  <?= Html::img($model->replace($mainImg->getUrl()), ['alt' => $model->name])?></div>
                                <!-- /.pro-img -->
                                <div class="pro-text-outer">  <span><?= $model->category->name?> </span>
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
                <?php
                    },
                    'layout' => "<div class='row'>{summary}</div><div class='row'>{items}</div><div class='clearfix'></div><div class='row'>{pager}</div>",
                ]) ?>
                <!--return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);-->

                <div class="col-xs-12">
                    <div class="grid-spr pag">
                        <!-- .pagetions -->
                        <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                            <ul class="pagination">
                                <li class="active"><a href="#">1 </a></li>
                                <li><a href="#">2 </a></li>
                                <li><a href="#">3 </a></li>
                                <li><a href="#">&raquo; </a></li>
                            </ul>
                        </div>
                        <!-- /.pagetions -->
                        <!-- .Showing -->
                        <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                            <strong>Showing 1-12  <span>of 30 relults </span></strong>
                        </div>
                        <!-- /.Showing -->
                    </div>
                </div>

            </div>
            <?php Pjax::end(); ?>
        </div>

    </div>
    <!-- /.grid-shop -->
</section>


