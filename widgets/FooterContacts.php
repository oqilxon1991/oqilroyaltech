<?php
namespace app\widgets;
use Yii;
use yii\base\Widget;
use app\models\Info;



class FooterContacts extends Widget {


    function run(){
        $tel = Info::find()->where(['key' => 'tel'])->one();
        $email = Info::find()->where(['key' => 'email'])->one();
        $address = Info::find()->where(['key' => 'address'])->one();
        $tel2 = Info::find()->where(['key' => 'tel2'])->one();


        return $this->render('footercontacts', compact('tel', 'email', 'address', 'tel2'));
    }
}