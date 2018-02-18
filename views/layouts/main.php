<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\SiteAsset;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;

SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <header>
        <div class="container text-center">
            <div  class="site-logo">
                <a href="<?= Yii::$app->homeUrl ?>"><img src="/img/dali.png" alt="<?= Yii::$app->name ?>"></a>
                <div class="slogan"><?= Yii::$app->params['slogan'] ?></div>
            </div>
            <?php
            NavBar::begin([
                'renderInnerContainer' => false,
                'options' => [
                    'class' => 'navbar navbar-simple',
                ],
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,

            ]);
            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav navbar-center',
                ],
                'items' => [
                    ['label' => 'Организация свадеб', 'url' => '/portfolio/wedding-organization', 'active' => (Yii::$app->controller->id == 'wedding')],
                    ['label' => 'Портфолио', 'url' => ['/portfolio'], 'items' => [
                        ['label' => 'Организация свадеб', 'url' => '/portfolio/wedding-organization', 'active' => (Yii::$app->request->get('slug') == 'weddingorganization')],
                        ['label' => 'Озеленение', 'url' => '/portfolio/phytodesign', 'active' => (Yii::$app->request->get('slug') == 'phytodesign')],
                        ['label' => 'Оформление свадеб', 'url' => '/portfolio/wedding-decorations', 'active' => (Yii::$app->request->get('slug') == 'wedding-decorations')],
                        ['label' => 'Оформление мероприятий', 'url' => '/portfolio/events', 'active' => (Yii::$app->request->get('slug') == 'events')],
                        ['label' => 'Новогоднее оформление', 'url' => '/portfolio/new-year', 'active' => (Yii::$app->request->get('slug') == 'new-year')],
                    ], 'active' => (Yii::$app->controller->id == 'portfolio')],
                    ['label' => 'Видео', 'url' => '/video', 'active' => (Yii::$app->controller->id == 'video')],
                    ['label' => 'О нас', 'url' => '/about', 'active' => (Yii::$app->request->get('slug') == 'about')],
                    ['label' => 'Контакты', 'url' => '/contacts', 'active' => (Yii::$app->controller->action->id == 'contacts')],
                    ['label' => 'Отзывы', 'url' => ['/reviews'], 'active' => (Yii::$app->controller->id == 'reviews')],
                ],
            ]);
            NavBar::end();
            ?>
        </div>
    </header>

    <?php
    if (isset($this->params['breadcrumbs'])) {
        echo Html::tag(
            'div',
            Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'],
                'homeLink' => [
                    'label' => Yii::$app->name,
                    'url' => Yii::$app->homeUrl,
                ],
                'options' => [
                    'class' => 'breadcrumb container',
                ]
            ]), [
            'class' => 'bg-grey'
        ]);
    }
    ?>
    <?= $content ?>
</div>
<footer class="footer">
    <div class="container">
        <div>
            <p>
                <b>Звоните нам:</b><br>
                <i class="glyphicon glyphicon-earphone"></i>&nbsp; <?= Yii::$app->params['phone'] ?><br>
                <i class="glyphicon glyphicon-earphone"></i>&nbsp; <?= Yii::$app->params['phone2'] ?>
            </p>
        </div>
        © <?= Yii::$app->name ?>
    </div>
</footer>
<?= $this->render('_counters') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
