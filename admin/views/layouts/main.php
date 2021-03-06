<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 07.03.17
 * Time: 20:25
 */

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php if (Yii::$app->user->isGuest): ?>
    <?= $content ?>
<?php else: ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'Admin'),
        'brandUrl' => ['/admin/default/index'],
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'Pages'), 'url' => ['/admin/page/default/index']],
            ['label' => Yii::t('app', 'Home blocks'), 'url' => ['/admin/home/index']],
            ['label' => Yii::t('app', 'Reviews'), 'url' => ['/admin/review/index']],
            //['label' => Yii::t('app', 'Block'), 'url' => ['/admin/block/default/index']],
            ['label' => Yii::t('app', 'Site'), 'url' => ['/site/index']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => Yii::t('app', 'Admin'), 'url' => '/admin/default/index'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
</div>
<footer class="footer footer-inverse bg-inverse py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 text-center">
                <div class="copyright">
                    © <?= Yii::$app->name ?> <?= date("Y") ?>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</footer>
<?php endif; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
