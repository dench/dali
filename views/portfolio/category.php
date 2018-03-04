<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/** @var $this yii\web\View */
/** @var $page dench\page\models\Page*/
/** @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label' => 'Портфолио',
    'url' => ['portfolio/index'],
];
$this->params['breadcrumbs'][] = '';

if (Yii::$app->request->get('page') == 1) {
    $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
}
//if ($dataProvider->pagination->page < $dataProvider->pagination->pageCount) {
    $this->registerLinkTag(['rel' => 'next', 'href' => Url::current(['page' => $dataProvider->pagination->page + 1])]);
//}
//if ($dataProvider->pagination->page > 1) {
    $this->registerLinkTag(['rel' => 'prev', 'href' => Url::current(['page' => $dataProvider->pagination->page - 1])]);
//}
?>
<div class="container">
    <h1><?= $page->h1 ?></h1>

    <?= $page->short ?>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "<div class=\"row cards\">{items}</div>\n<div class=\"clear-pager text-center\">{pager}</div>",
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
    ]);
    ?>
    <?php if (Yii::$app->request->get('page') < 2): ?>
    <?= $page->text ?>
    <?php endif; ?>
</div>