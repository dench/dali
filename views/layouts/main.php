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
                    ['label' => 'Портфолио', 'url' => ['#'], 'items' => [
                        ['label' => 'Оформление свадеб', 'url' => '/portfolio/svadby'],
                        ['label' => 'Оформление праздников', 'url' => '/portfolio/prazdniki'],
                        ['label' => 'Оформление мероприятий', 'url' => '/portfolio/meropriatia'],
                        ['label' => 'Новогоднее оформление', 'url' => '/portfolio/novyj-god'],
                        ['label' => 'Оформление витрин', 'url' => '/portfolio/vitriny'],
                        ['label' => 'Букеты и цветочные композиции', 'url' => '/portfolio/bouquets-flower-compositions'],
                        ['label' => 'Озеленение', 'url' => '/portfolio/greenery'],
                    ]],
                    ['label' => 'Услуги', 'url' => ['#'], 'items' => [
                        ['label' => 'Оформление свадеб', 'url' => '/services/oformlenie-svadeb'],
                        ['label' => 'Оформление праздников', 'url' => '/services/oformlenie-prazdnikov'],
                        ['label' => 'Оформление мероприятий', 'url' => '/services/oformlenie-meropriatij'],
                        ['label' => 'Новогоднее оформление', 'url' => '/services/novogodnee-oformlenie'],
                        ['label' => 'Оформление витрин', 'url' => '/services/oformlenie-vitrin'],
                        ['label' => 'Букеты и цветочные композиции', 'url' => '/services/bukety-cvetocnye-kompozicii'],
                        ['label' => 'Озеленение', 'url' => '/services/ozelenenie'],
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
        © Da-Li 2017
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
