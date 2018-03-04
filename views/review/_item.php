<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 18.02.18
 * Time: 18:17
 *
 * @var $model app\models\Review
 */

use yii\helpers\Url;

?>
<div class="media panel panel-default">
    <div class="media-body panel-body">
        <div class="stars pull-right">
            <?php
                for ($i = 0; $i < $model->value; $i++) {
                    echo '<i class="glyphicon glyphicon-star text-warning"></i>';
                }
            ?>
        </div>
        <h4 class="media-heading">
            <?php if ($model->link) : ?>
                <a href="<?= $model->link ?>" target="_blank"><img src="/img/facebook.svg"> <?= $model->name ?></a>
            <?php else: ?>
                <?= $model->name ?>
            <?php endif; ?>
        </h4>
        <?php if ($model->page_id) : ?>
            <div class="media-text">
                <a href="<?= Url::to(['portfolio/view', 'slug' => $model->page->slug]) ?>"><?= $model->page->name ?></a>
            </div>
        <?php endif; ?>
        <div class="media-text">
            <?= $model->text ?>
        </div>
    </div>
</div>