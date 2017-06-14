<?php
use dench\image\helpers\ImageHelper;

/** @var $this yii\web\View */
/** @var $model app\models\Page */
/** @var $back string */

?>
<div class="container">
    <?php if ($back) : ?><div class="back"><a href="<?= $back ?>">&larr; Назад</a></div><?php endif; ?>
    <h1><?= $model->h1 ?></h1>
    <?= $model->text ?>

    <?php if (empty($model->childs)) : ?>
        <?php foreach ($model->images as $image) : ?>
            <div class="image <?= ($image->width/$image->height < 1) ? 'col-md-6' : 'col-md-12' ?>">
                <img src="<?= ImageHelper::thumb($image->id, 'big') ?>" alt="<?= $image->alt ?>" class="img-responsive">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>