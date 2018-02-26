<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property integer $id
 * @property string $address_ru
 * @property string $tel_ru
 * @property string $email_ru
 * @property string $address_uz
 * @property string $tel_uz
 * @property string $email_uz
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_ru', 'tel_ru', 'email_ru', 'address_uz', 'tel_uz', 'email_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address_ru' => Yii::t('app', 'Address Ru'),
            'tel_ru' => Yii::t('app', 'Tel Ru'),
            'email_ru' => Yii::t('app', 'Email Ru'),
            'address_uz' => Yii::t('app', 'Address Uz'),
            'tel_uz' => Yii::t('app', 'Tel Uz'),
            'email_uz' => Yii::t('app', 'Email Uz'),
        ];
    }

    public  function getAddress(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->address_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->address_uz;
        }
    }

    public  function getTel(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->tel_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->tel_uz;
        }
    }

    public  function getEmail(){
        if (\Yii::$app->language=='ru-RU'){
            return $this->email_ru;
        }
        if (\Yii::$app->language=='uz-UZ'){
            return $this->email_uz;
        }
    }
}
