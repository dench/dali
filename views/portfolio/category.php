<?php
use dench\image\helpers\ImageHelper;

/** @var $this yii\web\View */
/** @var $model app\models\Page */

?>
<div class="container">
    <h1 class="title"><?= $model->h1 ?></h1>
    <?= $model->text ?>

    <div class="row cards">
        <?php foreach ($model->childs as $child) : ?>
            <div class="col-xs-6 col-md-4 card block-link">
                <div class="card-content">
                    <h3><a href="<?= \yii\helpers\Url::to(['portfolio/view', 'slug' => $child->slug]) ?>" class="card-photo"><?= $child->name ?></a></h3>
                </div>
                <?php if ($image = current($child->images)) : ?>
                    <img src="<?= ImageHelper::thumb($image->id, 'cover') ?>" alt="<?= $image->alt ?>" class="img-responsive">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>