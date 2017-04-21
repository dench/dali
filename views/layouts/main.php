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
                    ['label' => 'Портфолио', 'url' => ['/portfolio']],
                    ['label' => 'Услуги', 'url' => ['/services'], 'items' => [
                        ['label' => 'Оформление свадеб', 'url' => '/services'],
                        ['label' => 'Оформление праздников', 'url' => '/services'],
                        ['label' => 'Оформление мероприятий', 'url' => '/services'],
                        ['label' => 'Новогоднее оформление', 'url' => '/services'],
                        ['label' => 'Оформление витрин', 'url' => '/services'],
                        ['label' => 'Букеты и цветочные композиции', 'url' => '/services'],
                        ['label' => 'Озеленение', 'url' => '/services'],
                    ]],
                    ['label' => 'Команда DaLi', 'url' => '/site/team'],
                    ['label' => 'Контакты', 'url' => '/site/contacts'],
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
