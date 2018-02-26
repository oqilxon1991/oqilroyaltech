<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
//$model->category_id = $_GET['category_id'];
//vd($model);
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'name_ru') ?>

    <?php // $form->field($model, 'content_ru') ?>

    <?php // $form->field($model, 'minicontent_ru') ?>

    <?= $form->field($model, 'min_price') ?>



    <?= $form->field($model, 'brand_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Brands::find()->all(),'id','name'),['prompt'=>'Выбрать']) ?>

    <?= $form->field($model, 'color_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Colors::find()->all(),'id','name'),['prompt'=>'Выбрать']) ?>

    <?= $form->field($model, 'category_id')->hiddenInput()->label(false) ?>

    <?php // echo $form->field($model, 'keywords_ru') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'hit') ?>

    <?php // echo $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'slider') ?>

    <?php // echo $form->field($model, 'name_uz') ?>

    <?php // echo $form->field($model, 'content_uz') ?>

    <?php // echo $form->field($model, 'minicontent_uz') ?>

    <?php // echo $form->field($model, 'keywords_uz') ?>

    <?php // echo $form->field($model, 'description_uz') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
