<?php

/* @var $this yii\web\View */
/* @var $items app\models\Home[] */
/* @var $page dench\page\models\Page */


?>

<div class="container">

    <?= $page->short ?>

    <?= Yii::$app->cache->getOrSet('_home_blocks_view-' . Yii::$app->language, function () use ($items) {
        return $this->render('_home_blocks_view', [
            'items' => $items,
        ]);
    });
    ?>

    <h1 class="title"><?= $page->h1 ?></h1>

    <?= $page->text ?>
</div>