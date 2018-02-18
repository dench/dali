<?php
/** @var $this yii\web\View */
/** @var $model dench\page\models\Page */

use dench\image\helpers\ImageHelper;
use yii\helpers\Url;

?>
<div class="col-xs-12 col-sm-6 col-md-4 card block-link">
    <div class="card-content">
        <h2><a href="<?= Url::to(['portfolio/view', 'slug' => $model->slug]) ?>" class="card-photo"><?= $model->name ?></a></h2>
        <small><?= $model->description ?></small>
    </div>
    <a href="<?= Url::to(['portfolio/view', 'slug' => $model->slug]) ?>">
    <?php if ($model->image) : ?>
        <img src="<?= ImageHelper::thumb($model->image->id, 'cover') ?>" alt="<?= $model->image->alt ?>" class="img-responsive">
    <?php else : ?>
        <img src="<?= Yii::$app->params['image']['none'] ?>" class="img-responsive img-none">
    <?php endif; ?>
    </a>
</div>