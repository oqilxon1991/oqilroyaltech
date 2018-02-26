<?php
namespace app\widgets;
use app\models\Brands;
use app\models\Colors;
use Yii;
use yii\base\Widget;
use app\models\Category;
use app\models\Product;



class FiltrList extends Widget {


    function run(){
        $id = Yii::$app->request->get('id');
        $undercat = Category::find()->where(['parent_id' => $id])->all();


        $brands = Brands::find()->all();
        $color = Colors::find()->all();
        return $this->render('filtrlist', compact('color', 'brands', 'undercat'));
    }
}


