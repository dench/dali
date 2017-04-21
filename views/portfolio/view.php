<?php
use dench\image\helpers\ImageHelper;

/** @var $this yii\web\View */
/** @var $model app\models\Page */
?>
<div class="container">
    <h1><?= $model->h1 ?></h1>
    <?= $model->text ?>

    <div class="row">
        <?php foreach ($model->childs as $child) : ?>
            <div class="col-xs-6 col-md-4 card block-link">
                <div class="card-content2">
                    <h3><a href="<?= \yii\helpers\Url::to(['view', 'slug' => $child->slug]) ?>" class="card-photo"><?= $child->name ?></a></h3>
                </div>
                <?php if (isset($child->images[0]->id)) : ?>
                    <img src="<?= ImageHelper::thumb($child->images[0]->id, 'small') ?>" alt="<?= $child->images[0]->alt ?>" class="img-responsive">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($model->childs)) : ?>
        <?php foreach ($model->images as $image) : ?>
            <div class="image">
                <img src="<?= ImageHelper::thumb($image->id, 'small') ?>" alt="<?= $image->alt ?>" class="img-responsive">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>