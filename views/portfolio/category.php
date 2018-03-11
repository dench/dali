<?php

use app\assets\PhotoSwipe;
use dench\image\helpers\ImageHelper;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var $this yii\web\View */
/** @var $page dench\page\models\Page*/
/** @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label' => 'Портфолио',
    'url' => ['portfolio/index'],
];
$this->params['breadcrumbs'][] = '';


if (!$dataProvider->count) {
    PhotoSwipe::register($this);
    Yii::$app->view->registerJsFile('@web/js/photoswipe.min.js', ['depends' => 'app\assets\PhotoSwipe']);
    $script = <<< JS
    initPhotoSwipeFromDOM('.images');
JS;
    Yii::$app->view->registerJs($script, yii\web\View::POS_READY);
}
?>
<div class="container">
    <h1><?= $page->h1 ?></h1>

    <?= $page->short ?>

    <?php if ($dataProvider->count): ?>
        <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
                'layout' => "<div class=\"row cards\">{items}</div>\n<div class=\"clear-pager text-center\">{pager}</div>",
                'emptyTextOptions' => [
                    'class' => 'alert alert-danger',
                ],
            ]);
        ?>
    <?php else: ?>
        <div class="images">
            <?php if (empty($page->childs)) : ?>
                <?php foreach ($page->images as $image) : ?>
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
    <?php endif; ?>

    <?php if (Yii::$app->request->get('page') < 2): ?>
    <?= $page->text ?>
    <?php endif; ?>
</div>

<?php if (!$dataProvider->count): ?>
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
<?php endif; ?>

<?php
$currentPage = $dataProvider->pagination->page + 1;
if ($currentPage > 1) {
    $this->registerLinkTag(['rel' => 'prev', 'href' => Url::current(['page' => $currentPage - 1])]);
}
if ($currentPage < $dataProvider->pagination->pageCount) {
    $this->registerLinkTag(['rel' => 'next', 'href' => Url::current(['page' => $currentPage + 1])]);
}
if ($currentPage == 1) {
    $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
}