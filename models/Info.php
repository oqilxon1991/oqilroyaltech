<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id
 * @property string $key
 * @property string $text_uz
 * @property int $text_ru
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_uz'], 'string'],
            [['text_ru'], 'string'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'text_uz' => Yii::t('app', 'Text Uz'),
            'text_ru' => Yii::t('app', 'Text Ru'),
        ];
    }


    public  function getText(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->text_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->text_uz;
        }
    }
}
