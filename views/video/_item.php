<?php
/** @var $this yii\web\View */
/** @var $model dench\page\models\Page */

use dench\image\helpers\ImageHelper;
use yii\helpers\Url;

?>
<div class="col-xs-12  col-sm-6 col-md-4 card block-link">
    <div class="card-content">
        <h3><a href="<?= Url::to(['video/view', 'slug' => $model->slug]) ?>" class="card-photo"><?= $model->name ?></a></h3>
        <small><?= $model->description ?></small>
    </div>
    <?php if ($model->image) : ?>
        <img src="<?= ImageHelper::thumb($model->image->id, 'cover') ?>" alt="<?= $model->image->alt ?>" class="img-responsive">
    <?php else : ?>
        <img src="<?= Yii::$app->params['image']['none'] ?>" class="img-responsive img-none">
    <?php endif; ?>
</div>