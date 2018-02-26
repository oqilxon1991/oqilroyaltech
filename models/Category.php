<?php

namespace app\models;

use Yii;


class Category extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }


    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name_ru', 'name_uz'], 'required'],
            [['name_ru', 'keywords_ru', 'description_ru', 'icon', 'name_uz', 'keywords_uz', 'description_uz'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'keywords_ru' => Yii::t('app', 'Keywords Ru'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'icon' => Yii::t('app', 'Icon'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'keywords_uz' => Yii::t('app', 'Keywords Uz'),
            'description_uz' => Yii::t('app', 'Description Uz'),
        ];
    }

    public  function getName(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->name_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->name_uz;
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


    public function getCatMany()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function getParentsMain()
    {
        return $this->hasOne(Brands::className(), ['id' => 'id']);
    }

    public static function getCategories4F($id_menu)
    {
        $categories = self::find()->select(['id', 'id_parent', 'name'])->where(['status' => self::STATUS_ACTIVE, 'id_menu' => $id_menu])->asArray()->all();
        foreach($categories as $k => $category){
            if($category['id_parent'] == 0){
                $parentCat[$category['id']] = ['id' => $category['id'], 'name' => $category['name']];
                unset($categories[$k]);
            }
        }
        foreach($parentCat as $key => $cat){
            foreach($categories as $i => $category){
                if($key == $category['id_parent'] ){
                    $bottomCat[$key][] = ['id' => $category['id'], 'name' => $category['name']];
                    unset($categories[$i]);
                }else if($category['id_parent'] == $cat['id']){
                    $bottomCat2[$i][] = ['id' => $category['id'], 'name' => $category['name']];
                }
            }
        }
        return ['categories' => $categories, 'parentCat' => $parentCat, 'bottomCat' => $bottomCat, 'bottomCat2' => $bottomCat2];
    }

    public function ProdCat($id){
        if($prod = Product::find()->where(['category_id' => $id])->all()){
            if($prod != null){
                foreach ($prod as $item){
                    $new[] = $item;
                }
                return $new;
            }
        }
    }

    public static function Main($id_menu)
    {
        if($input = self::find()->where(['id' => $id_menu])->one()){
            if($input->parent_id == 0){
                $categories = self::find()->where(['parent_id' => $input->id])->all();
                foreach ($categories as $menus){
                    $menu[] = $menus->id;
                }
                foreach ($menu as $imenu){
                    $mas[] = self::prodCat($imenu);
                    foreach ($mas as $m){
                        $k[] = $m;
                    }

                }

                return $k;
            }
        }


    }

}

