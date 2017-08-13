<?php

use app\assets\PhotoSwipe;
use dench\image\helpers\ImageHelper;

/** @var $this yii\web\View */
/** @var $model app\models\Page */
/** @var $back string */

$this->params['breadcrumbs'][] = [
    'label' => 'Портфолио',
    'url' => ['portfolio/index'],
];
$this->params['breadcrumbs'][] = [
    'label' => $model->parent->name,
    'url' => ['portfolio/category', 'slug' => $model->parent->slug],
];
$this->params['breadcrumbs'][] = '';

PhotoSwipe::register($this);
Yii::$app->view->registerJsFile('@web/js/photoswipe.min.js', ['depends' => 'app\assets\PhotoSwipe']);
$script = <<< JS
    initPhotoSwipeFromDOM('.images');
JS;
Yii::$app->view->registerJs($script, yii\web\View::POS_READY);
?>
<div class="container">
    <h1><?= $model->h1 ?></h1>
    <?= $model->text ?>

    <div class="images">
        <?php if (empty($model->childs)) : ?>
            <?php foreach ($model->images as $image) : ?>
                <?php if ($image->width/$image->height < 1) : ?>
                    <a href="<?= ImageHelper::thumb($image->id, 'portrained') ?>" class="image col-xs-6" data-size="<?= Yii::$app->params['image']['size']['portrained']['width'] ?>x<?= Yii::$app->params['image']['size']['portrained']['height'] ?>">
                        <img src="<?= ImageHelper::thumb($image->id, 'portrained') ?>" alt="<?= $image->alt ?>" class="img-responsive">
                    </a>
                <?php else : ?>
                    <a href="<?= ImageHelper::thumb($image->id, 'landscape') ?>" class="image col-sm-12" data-size="<?= Yii::$app->params['image']['size']['landscape']['width'] ?>x<?= Yii::$app->params['image']['size']['landscape']['height'] ?>">
                        <img src="<?= ImageHelper::thumb($image->id, 'landscape') ?>" alt="<?= $image->alt ?>" class="img-responsive">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>


<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>