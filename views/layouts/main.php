<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use app\widgets\LangWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Contacts;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <!-- Original URL: http://demo.zavana.net/complex/complex/index2.html
    Date Downloaded: 08.11.2017 17:59:33 !-->
    <meta http-equiv="Content-Type" content="text/html"; />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Standard -->
    <link rel="shortcut icon" href="/images/favicon.png" />
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!--  Preloader  -->

<div id="preloader">
    <div id="loading">
    </div>
</div>
<header>
    <!--  top-header  -->
    <div class="top-header">
        <div class="container">

            <?= app\widgets\LangWidget::widget();?>
            <div class="col-md-6">
                <div class="top-header-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="icon-note icons" style="color: #f0f0f0;"></i> <?= Yii::t('main', 'feedback')?></a> </li>

                        <?php if (!Yii::$app->user->isGuest): ?>
                        <li>
                            <div class="dropdown">
                                <a href="<?= \yii\helpers\Url::to(['/site/logout'])?>" class="btn btn-default dropdown-toggle">
                                    <i class="fa fa-user" aria-hidden="true"></i> <?= Yii::$app->user->identity['username']?> (<?= Yii::t('main', 'exit')?>)
                                </a>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php if (Yii::$app->user->isGuest) { ?>
                        <li>
                            <div class="dropdown">
                                <a href="<?= \yii\helpers\Url::to(['/site/login'])?>" class="btn btn-default dropdown-toggle">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> <?= Yii::t('main', 'login')?>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="dropdown">
                                <a href="<?= \yii\helpers\Url::to(['/site/signup'])?>" class="btn btn-default dropdown-toggle">
                                    <i class="fa fa-registered" aria-hidden="true"></i> <?= Yii::t('main', 'registration')?>
                                </a>
                            </div>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
        <!--  /top-header  -->
    </div>
    <!--                    <a href="#" class="button11 roboto caps"></a>-->
    <div class="row nopadding">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="top: 30%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #0a0a0a"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="recipient-name" placeholder="Ф.И.О.">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="recipient-name" placeholder="Номер телефона">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message-text" placeholder="Сообщение..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="top-md-menu">
        <div class="container">

            <div class="col-sm-3">
                <!-- Search box Start -->
                <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                    <div class="well carousel-search hidden-phone">

                        <div class="search">
                            <input type="text" placeholder="<?= Yii::t('main', 'search')?>..." name="q" />
                        </div>
                        <div class="btn-group">
                            <button type="submit" id="btnSearch" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
                <!-- Search box End -->
            </div>
            <div class="col-sm-6">
                <a href="<?= \yii\helpers\Url::lang()?>">
                    <div class="logo">
                        <h6><?= Html::img('@web/images/logo.png', ['alt' => 'Royaltech.uz'])?></h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <!-- cart-menu -->
                <div class="cart-menu">
                    <ul>
                        <li class="dropdown">
                            <a href="#" onclick="return getCart()" data-toggle="dropdown" data-hover="dropdown"><i class="icon-basket-loaded icons" aria-hidden="true"></i></a><!--<span class="subno">2 </span>--><strong><?= Yii::t('main', 'cart')?> </strong>
                        </li>
                    </ul>
                </div>
                <!-- cart-menu End -->
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="navigation" id="navigation">
                            <ul>
                                <li class="all-departments active"><a href="#" style="margin-right: 50px;"><?= Yii::t('main', 'categories')?> </a>
                                    <ul>
                                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::lang()?>" role="button">Главная</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['hits/index']);?>">Хиты продаж!</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['bestsellers/index']);?>">Товары со скидками!</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['newproducts/index']);?>">Новинки</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['site/contact']);?>">Контакты</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- header-outer -->

    <!-- /header-outer -->
</header>
<!-- deal-outer -->
<?= $content ?>

<!-- newsletter -->
<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                <h4>Компания «RoyalTech» – сеть магазинов бытовой техники, электроники и товаров для дома в Ташкенте. </h4>
            </div>
        </div>
    </div>
</section>
<!-- /newsletter -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <!-- f-weghit -->
                <div class="f-weghit">
                    <img src="/images/logo.png" alt="logo" />
                    <p><strong>Complex </strong> is a premium _________ theme with advanced admin ______. It’s extremely customizable, easy __ use and fully responsive ___ retina ready. </p>
                </div>
                <!-- /f-weghit -->
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <!-- f-weghit2 -->
                <div class="f-weghit2">
                    <h4>БЫСТРЫЕ ССЫЛКИ </h4>
                    <ul>
                        <li class="dropdown">
                            <a href="<?= \yii\helpers\Url::lang()?>" role="button" aria-expanded="false"><span>Главная </span></a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= \yii\helpers\Url::to(['hits/index']);?>" role="button" aria-expanded="false"><span>Хиты продаж! </span></a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= \yii\helpers\Url::to(['bestsellers/index']);?>" role="button" aria-expanded="false"><span>Товары со скидками! </span></a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= \yii\helpers\Url::to(['newproducts/index']);?>" role="button" aria-expanded="false"><span>Новинки </span></a>
                        </li>
                    </ul>
                </div>
            </div><?/*= \app\widgets\FooterContacts::widget();*/?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <!-- f-weghit -->
                <div class="f-weghit">
                    <h4>КОНТАКТЫ </h4>
                    <ul>
                        <?= \app\widgets\FooterContacts::widget();?>
                    </ul>
                </div>
                <!-- /f-weghit -->
            </div>
            <!-- copayright -->
            <div class="copayright">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        Copyright ©  2017.<a href="#"> RoyalTech.uz </a> Все права защищены.
                    </div>
                    <div class="text-right col-xs-12 col-sm-6 col-md-6">
                        <p>Разработчик: <a href="#"> Innovative Web Idea</a></p>
                    </div>
                </div>
            </div>
            <!-- /copayright -->

        </div>
    </div>
</footer>
<!-- sticky-socia -->
<aside id="sticky-social">
    <ul>
        <li><a href="#" class="fa fa-facebook" target="_blank"><span><i class="fa fa-facebook" aria-hidden="true"></i> Facebook </span></a></li>
        <li><a href="#" class="fa fa-twitter" target="_blank"><span><i class="fa fa-twitter" aria-hidden="true"></i> Twitter </span></a></li>
    </ul>
</aside>

<p id="back-top">
    <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
</p>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'

]);
\yii\bootstrap\Modal::end();
?>

<?php
$script = <<< JS
    (function(){ var widget_id = 'KfxU8lz0vp';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>


<?php
$script = <<< JS
    $('#exampleModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget); // Button that triggered the modal
var recipient = button.data('whatever'); // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this);
modal.find('.modal-title').text('Отправьте короткое сообщение и мы обязательно свяжемся с вами!');
modal.find('.modal-body input').val(recipient)
});
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<?php
$script = <<< JS
    var slider = new MasterSlider();

    // adds Arrows navigation control to the slider.
     slider.control('arrows');
    // slider.control('bullets');

     slider.setup('masterslider' , {
         width:730,
         height:482,
         space:0,
         loop:true,
         preload:0,
		 speed: 36,
		 view:'parallaxMask',
         autoplay:true
    });
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
