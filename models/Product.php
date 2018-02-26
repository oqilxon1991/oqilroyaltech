<?php

namespace app\models;
use app\modules\admin\models\OrderItems;
use Yii;

class Product extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'brand_id', 'color_id'], 'integer'],
            [['content_ru', 'hit', 'new', 'sale', 'top', 'slider', 'content_uz'], 'string'],
            [['price'], 'number'],
            [['name_ru', 'minicontent_ru', 'keywords_ru', 'description_ru', 'img', 'name_uz', 'minicontent_uz', 'keywords_uz', 'description_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'minicontent_ru' => Yii::t('app', 'Minicontent Ru'),
            'price' => Yii::t('app', 'Price'),
            'keywords_ru' => Yii::t('app', 'Keywords Ru'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'img' => Yii::t('app', 'Img'),
            'hit' => Yii::t('app', 'Hit'),
            'new' => Yii::t('app', 'New'),
            'sale' => Yii::t('app', 'Sale'),
            'top' => Yii::t('app', 'Top'),
            'slider' => Yii::t('app', 'Slider'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'minicontent_uz' => Yii::t('app', 'Minicontent Uz'),
            'keywords_uz' => Yii::t('app', 'Keywords Uz'),
            'description_uz' => Yii::t('app', 'Description Uz'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    public function getColors()
    {
        return $this->hasOne(Colors::className(), ['id' => 'color_id']);
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['product_id' => 'id']);
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id' => 'id']);
    }

    public function getProductComments()
    {
        return $this->getComments()->where(['status'=>'1'])->all();
    }

    public function getCat()
    {
        return $this->category->name;
    }

    public  function getName(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->name_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->name_uz;
        }
    }

    public  function getContent(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->content_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->content_uz;
        }
    }

    public  function getMinicontent(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->minicontent_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->minicontent_uz;
        }
    }

    public  function getKeywords(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->keywords_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->keywords_uz;
        }
    }

    public  function getDescription(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->description_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->description_uz;
        }
    }

    public function getProductsByParentCategory($category_id){
        $connection = Yii::$app->getDb();

        $categoriesQ = 'SELECT id FROM `category` WHERE `parent_id` = '.$category_id;
        $categoriesC = $connection->createCommand($categoriesQ);
        $categories = $categoriesC->queryAll();
        //vd($categories);
        //$categories = join(', ', $categories);
        $categoriesArr = [];
        foreach ($categories as $category){
            array_push($categoriesArr, $category['id']);
        }
        //$categories = join(', ', $categoriesArr);
//vd($categories);
        $products = $this->find()->where(['IN', 'category_id', $categoriesArr]);
        //echo $this->find()->where(['IN', 'category_id', $categories])->createCommand()->sql; die;
        //vd($products);
        /*$products = (new \yii\db\Query())
            ->from('product')
            ->where(['IN', 'category_id', $categories])
            ->all();*/
        //vd($products);
        /*$query = "SELECT * FROM `product` WHERE `category_id` IN ($categories)";
        $productsC = $connection->createCommand($query);
        $products = $productsC->queryAll();*/
        return $products;
    }
}



