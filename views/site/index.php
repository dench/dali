<?php

/* @var $this yii\web\View */
/* @var $items app\models\Page[] */

use dench\image\helpers\ImageHelper;
use yii\helpers\Url;

?>
<div class="container">
    <!--<h1 class="title"><?= $this->params['page']->h1 ?></h1>-->

    <div class="row cards">
        <?php foreach ($items as $child) : ?>
            <div class="col-xs-12 col-sm-6 col-md-4 card block-link">
                <div class="card-content">
                    <?php if ($child->parent->slug == 'services') : ?>
                        <h2><a href="<?= Url::to(['services/view', 'slug' => $child->slug]) ?>" class="card-photo"><?= $child->name ?></a></h2>
                    <?php else : ?>
                        <h2><a href="<?= Url::to(['portfolio/view', 'slug' => $child->slug]) ?>" class="card-photo"><?= $child->name ?></a></h2>
                    <?php endif; ?>
                </div>
                <?php if ($child->image) : ?>
                    <img src="<?= ImageHelper::thumb($child->image->id, 'cover') ?>" alt="<?= $child->image->alt ?>" class="img-responsive">
                <?php else : ?>
                    <img src="<?= Yii::$app->params['image']['none'] ?>" class="img-responsive img-none">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?= $this->params['page']->text ?>
</div>