<?php
use app\widgets\PortfolioCard;

/** @var $model dench\page\models\Page */
/** @var $this yii\web\View */

echo Yii::$app->cache->getOrSet('page_card-' . $model->id . '-' . Yii::$app->language, function () use ($model) {
    return PortfolioCard::widget([
        'model' => $model,
    ]);
});