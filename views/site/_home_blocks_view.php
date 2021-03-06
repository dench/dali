<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 11.03.18
 * Time: 14:51
 */

use dench\image\helpers\ImageHelper;

?>
<div class="row cards">
    <?php foreach ($items as $item) : ?>
        <div class="col-xs-12 col-sm-6 col-md-4 card block-link">
            <div class="card-content">
                <h2><a href="<?= $item->link? $item->link : $item->pageLink ?>" class="card-photo"><?= $item->name ?></a></h2>
            </div>
            <a href="<?= $item->link ? $item->link : $item->pageLink ?>">
                <?php if ($item->image) : ?>
                    <img src="<?= ImageHelper::thumb($item->image->id, 'cover') ?>" alt="<?= $item->image->alt ?>" class="img-responsive">
                <?php elseif ($item->page->image) : ?>
                    <img src="<?= ImageHelper::thumb($item->page->image->id, 'cover') ?>" alt="<?= $item->page->image->alt ?>" class="img-responsive">
                <?php else : ?>
                    <img src="<?= Yii::$app->params['image']['none'] ?>" class="img-responsive img-none">
                <?php endif; ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>
