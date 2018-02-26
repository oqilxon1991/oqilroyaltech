<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="shopping-cart">
    <!-- .shopping-cart -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная </a></li>
                    <li class="breadcrumb-item active">Наши Контакты </li>
                </ol>
            </div>
            <div class="col-md-6 contact-info">
                <div class="contact-form">
                    <form action="#" method="post" id="commentform" class="comment-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-bg">
                                    <p>Если у вас есть к нам вопросы, вы можете отправить нам сообщение на почту или связаться с нами по телефону. </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="lable">Ваша Имя  <span>* </span></div>
                                <p class="comment-form-author"><input id="author" name="author" value="" size="30" type="text" /></p>
                            </div>
                            <div class="col-md-6">
                                <div class="lable">Номер телефона  <span>* </span></div>
                                <p class="comment-form-email"><input id="number" name="number" value="" size="30" type="text" /></p>
                            </div>
                            <div class="col-md-12">
                                <div class="lable">Сообшение  <span>* </span></div>
                                <p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="Сообшение" aria-required="true"></textarea></p>
                            </div>
                            <div class="col-md-12">
                                <p class="form-submit"><input name="submit" id="submit" class="btn btn-secondary" value="Отправить" type="submit" />   </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 contact-info">

                <div class="col-md-12">
                    <div class="contact-bg">
                        <h2>Наши Контакты </h2>
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">
                        <h6>Наш адрес: </h6><?= $address['text']?>
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">
                        <h6>Email:  </h6><?= $email['text']?>
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">
                        <h6>Тел: </h6><?= $tel['text']?> <br /><?= $tel2['text']?>
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">
                        <h6>Time Hourss </h6>
                        Monday to Friday: 10h:00 __ to 7h:00 Pm <br />
                        Saturday: 10h:00 Am to 4_:00 Pm <br />
                        Sunday: 12h:00 Am to 4_:00 Pm
                    </div>
                </div>
                <div class="map">
                    <!--  map  -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.3635889399843!2d69.32084721542373!3d41.322706479270174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef4e52e593243%3A0x227640a453df94f3!2zNDYgTWlyem8gVWx1ZydiZWsgc2hvaCBrbydjaGFzaSwg0KLQvtGI0LrQtdC90YIsINCj0LfQsdC10LrQuNGB0YLQsNC9!5e0!3m2!1sru!2sru!4v1469623402149" frameborder="0" style="border: 0; width: 100%; height: 300px; " allowfullscreen></iframe>

                    <div id="map"></div>
                    <!--  m/ap  -->
                </div>


            </div>
        </div>

    </div>
    <!-- /.shopping-cart -->
</section>
