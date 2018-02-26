<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property integer $id
 * @property string $name_ru
 * @property string $name_uz
 * @property string $color
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colors';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_uz', 'color'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    public function getId0()
    {
        return $this->hasOne(Product::className(), ['id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'color' => Yii::t('app', 'Color'),
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
}
