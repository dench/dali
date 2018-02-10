<?php

use dench\image\widgets\ImageForm;
use dench\language\models\Language;
use dench\page\models\Page;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Home */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="home-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
        <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
    <?php endforeach; ?>

    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
        <?= $form->field($model, 'description' . $suffix)->textarea() ?>
    <?php endforeach; ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_id')->dropDownList(Page::getList(true), ['prompt' => '-']) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= ImageForm::widget([
        'image' => $model->image,
        'modelInputName' => 'Home',
        'size' => 'cover',
        'col' => 'col-sm-4 col-md-3',
        'label' => null,
    ]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
