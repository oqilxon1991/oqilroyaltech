<?php
namespace rico\yii2images\models;
namespace rico\yii2images;

use rico\yii2images\models\PlaceHolder;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\ActiveRecord;
use rico\yii2images\models\Image;
use yii\bootstrap\ActiveForm;
?>

<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();

?>


    <section class="grid-shop">
    <!-- .grid-shop -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная </a></li>
                    <li class="breadcrumb-item"><?= $product->cat; ?> </li>
                    <li class="breadcrumb-item active"><?= $product->name; ?> </li>
                </ol>

                <div class="row">
                    <!-- left side -->
                    <div class="col-sm-5 col-md-5">
                        <!-- product gallery -->
                        <div class="connected-carousels">
                            <div class="stage">
                                <div class="carousel carousel-stage">
                                    <ul>
                                        <?php foreach ($gallery as $photo):?>
                                            <img class="zoom_01" src='<?= $product->replace($photo->getUrl()); ?>'  />
                                        <?php endforeach;?>

                                    </ul>
                                </div>
                                <a href="#" class="prev prev-stage"><span>&lsaquo; </span></a>
                                <a href="#" class="next next-stage"><span>&rsaquo; </span></a>
                            </div>

                            <div class="navigation">
                                <a href="#" class="prev prev-navigation">&lsaquo; </a>
                                <a href="#" class="next next-navigation">&rsaquo; </a>
                                <div class="carousel carousel-navigation">
                                    <ul>
                                        <?php foreach ($gallery as $photo):?>
                                        <li><img src="<?= $product->replace($photo->getUrl()); ?>" width="110" height="110" alt="" /></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- / product gallery -->
                    </div>
                    <!-- left side -->
                    <!-- right side -->
                    <div class="col-sm-7 col-md-7">
                        <!-- .pro-text -->
                        <div class="pro-text product-detail">
                            <!-- /.pro-img -->
                            <span class="span1"><?= $product->category->name?> </span>
                            <a href="#">
                                <h4> <?= $product->name?>  </h4>
                            </a>
                            <p class="in-stock">Бренд:    <span><?= $product->brands->name;?> </span></p>
                            <div class="star2">
                                <ul>
                                    <li class="yellow-color"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="yellow-color"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="yellow-color"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="yellow-color"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><a href="#">отзывы(0) </a></li>
                                    <li><a href="#"> Добавить отзыв </a></li>
                                </ul>
                            </div>
                            <p>Цена: <strong> $<?= $product->price;?> </strong></p>

                            <p class="in-stock">Цвет:    <span><?= $product->colors->name;?> </span></p>
                            <h4>Короткое описание:</h4>
                            <p><?= $product->minicontent?>  </p>
                            <form>
                                <h5>Количество:</h5>
                                <div class="numbers-row">
                                    <input type="text" name="french-hens" id="qty" value="1" />
                                </div>
                            </form>
                            <a href="#" data-id="<?= $product->id?>" class="addtocart2 add-to-cart">Добавить в корзину</a>
                        </div>
                        <!-- /.pro-text -->
                    </div>
                </div>
                <div class="row">
                    <div class="tab-bg">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#home">Характеристика </a></li>
                            <li><a data-toggle="tab" href="#menu2">Отзивы (0) </a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <p> <?= $product->content?> </p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                        <?php if(!empty($comments)):;?>
                            <?php foreach($comments as $com):;?>
                            <h5><span style="color: rgb(177, 30, 34);"><?= $com->user->username;?></span> (<?= $com->getDate();?>) </h5>
                            <p><?= $com->text;?> </p>
                            <p style="border-bottom: 1px solid rgb(235, 235, 235);"></p>
                            <?php endforeach;?>
                        <?php endif;?>
                        <?php if(!Yii::$app->user->isGuest):?>
                        <div class="col-md-6 contact-info">   
                         <div class="contact-form">
                            <?php if(Yii::$app->session->getFlash('comment')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= Yii::$app->session->getFlash('comment'); ?>
                                    
                                </div>
                            <?php endif;?>
                            <?php $form = ActiveForm::begin([
                                'action' => ['product/comment', 'id'=>$product->id], 
                                'options' => ['class'=>'comment-form', 'role'=>'form']])?>
                            <div class="col-md-12">
                               <div><b>Оставить отзыв:</b></div>
                               <p class="comment-form-comment"><?= $form-> field($commentForm, 'comment')->textarea(['id'=>'comment', 'placeholder'=>'Отзыв...', 'cols'=>25, 'rows'=>8])->label(false);?></p>
                            </div>
                            <div class="col-md-12">
                               <p class="form-submit"><input name="submit" id="submit" class="btn btn-secondary" value="ОТПРАВИТЬ" type="submit" /></p> 
                            </div>
                            <?php ActiveForm::end();?>
                        </div>                              
                            
                      </div>
                     <?php endif; ?>
                   </div>
                        </div>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-demo-outer">
                    <!-- #owl-demo -->
                    <div id="owl-demo8" class="deals-wk2">
                        <div class="item">
                            <?php foreach ($hits as $hit): ?>
                                <?php $mainImg = $hit->getImage();?>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <!-- .pro-text -->
                                <div class="pro-text text-center">
                                    <!-- .pro-img -->
                                    <a href="<?= Url::to(['product/view', 'id' => $hit->id])?>">
                                        <div class="pro-img">
                                            <?= Html::img($hit->replace($mainImg->getUrl()), ['alt' => $hit->name])?>
                                            <sup class="sale-tag">Хит! </sup>

                                        </div>
                                    </a>
                                    <!-- /.pro-img -->
                                    <div class="pro-text-outer">  <span><?= $hit->category->name?> </span>
                                        <a href="<?= Url::to(['product/view', 'id' => $hit->id])?>">
                                            <h4> <?= $hit->name?>  </h4>
                                        </a>
                                        <p class="wk-price">$<?= $hit->price?>  </p>  <a href="#" class="add-btn">Добавить в корзину </a>  </div>
                                </div>
                                <!-- /.pro-text -->
                            </div>
                            <?php endforeach;?>



                        </div>
                        <!-- /#owl-demo -->
                    </div>
                </div>
            </div>
            <!-- right side -->
        </div>
    </div>
    <!-- /.grid-shop -->
</section>
<?php
$script = <<< JS
    $('.zoom_01').elevateZoom({
			zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
		});
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>