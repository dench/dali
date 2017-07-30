<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\SiteAsset;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use app\assets\CommonAsset;

CommonAsset::register($this);
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
                <a href="<?= Yii::$app->homeUrl ?>"><img src="/img/da-li.png" alt="Da-Li"></a>
            </div>
            <?php
            NavBar::begin([
                'renderInnerContainer' => false,
                'options' => [
                    'class' => 'navbar navbar-simple',
                ],
                'brandLabel' => 'Da Li',
                'brandUrl' => Yii::$app->homeUrl,

            ]);
            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav navbar-center',
                ],
                'items' => [
                    ['label' => 'Портфолио', 'url' => ['/portfolio'], 'items' => [
                        ['label' => 'Оформление свадеб', 'url' => '/portfolio/wedding'],
                        ['label' => 'Оформление праздников', 'url' => '/portfolio/holidays'],
                        ['label' => 'Оформление мероприятий', 'url' => '/portfolio/events'],
                        ['label' => 'Новогоднее оформление', 'url' => '/project/new-year'],
                        ['label' => 'Оформление витрин', 'url' => '/portfolio/shop-window'],
                        ['label' => 'Озеленение', 'url' => '/portfolio/landscaping'],
                    ]],
                    ['label' => 'Услуги', 'url' => ['/services'], 'items' => [
                        ['label' => 'Оформление свадеб', 'url' => '/services/wedding-decoration'],
                        ['label' => 'Оформление праздников', 'url' => '/services/holidays-decoration'],
                        ['label' => 'Оформление мероприятий', 'url' => '/services/events-decoration'],
                        ['label' => 'Новогоднее оформление', 'url' => '/services/new-year-decoration'],
                        ['label' => 'Оформление витрин', 'url' => '/services/shop-window-decoration'],
                        ['label' => 'Озеленение', 'url' => '/services/landscaping-decoration'],
                    ]],
                    ['label' => 'Команда DaLi', 'url' => '/about'],
                    ['label' => 'Контакты', 'url' => '/contacts'],
                    ['label' => 'Блог', 'url' => ['/blog']],
                ],
            ]);
            NavBar::end();
            ?>
        </div>
    </header>

    <?= $content ?>
</div>
<footer class="footer">
    <div class="container">
        <div>
            <?= Html::a('Портфолио', ['/portfolio']) ?> | <?= Html::a('Услуги', ['/services']) ?>
        </div>
        © Da-Li 2017
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
