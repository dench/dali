<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Yii::t('app', 'Привіт') ?></p>
    <p><?= \yii\helpers\Url::to(['site/about', 'lang' => 'ru']) ?></p>
    <p><?= \yii\helpers\Url::to(['site/about']) ?></p>
    <p><?= \dench\language\widgets\Lang::widget() ?></p>
    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
