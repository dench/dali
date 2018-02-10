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
                <a href="<?= Yii::$app->homeUrl ?>"><img src="/img/dali.png" alt="Da Li"></a>
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
                    ['label' => 'Организация свадеб', 'url' => '/services/wedding-organization', 'active' => (Yii::$app->controller->id == 'blog')],
                    ['label' => 'Портфолио', 'url' => ['/portfolio'], 'items' => [
                        ['label' => 'Организация свадеб', 'url' => '/portfolio/wedding-projects', 'active' => (Yii::$app->request->get('slug') == 'wedding-projects')],
                        ['label' => 'Озеленение', 'url' => '/portfolio/phytodesign', 'active' => (Yii::$app->request->get('slug') == 'phytodesign')],
                        ['label' => 'Оформление свадеб', 'url' => '/portfolio/wedding', 'active' => (Yii::$app->request->get('slug') == 'wedding')],
                        ['label' => 'Оформление праздников', 'url' => '/portfolio/celebration', 'active' => (Yii::$app->request->get('slug') == 'celebration')],
                        ['label' => 'Оформление мероприятий', 'url' => '/portfolio/events', 'active' => (Yii::$app->request->get('slug') == 'events')],
                        ['label' => 'Новогоднее оформление', 'url' => '/portfolio/new-year', 'active' => (Yii::$app->request->get('slug') == 'new-year')],
                    ], 'active' => (Yii::$app->controller->id == 'portfolio')],
                    ['label' => 'Услуги', 'url' => ['/services'], 'items' => [
                        ['label' => 'Организация свадеб', 'url' => '/services/wedding-organization', 'active' => (Yii::$app->request->get('slug') == 'wedding-organization')],
                        ['label' => 'Озеленение', 'url' => '/services/phyto-decoration', 'active' => (Yii::$app->request->get('slug') == 'phyto-decoration')],
                        ['label' => 'Оформление свадеб', 'url' => '/services/wedding-decoration', 'active' => (Yii::$app->request->get('slug') == 'wedding-decoration')],
                        ['label' => 'Оформление праздников', 'url' => '/services/celebration-decoration', 'active' => (Yii::$app->request->get('slug') == 'celebration-decoration')],
                        ['label' => 'Оформление мероприятий', 'url' => '/services/events-decoration', 'active' => (Yii::$app->request->get('slug') == 'events-decoration')],
                        ['label' => 'Новогоднее оформление', 'url' => '/services/new-year-decoration', 'active' => (Yii::$app->request->get('slug') == 'new-year-decoration')],
                    ], 'active' => (Yii::$app->controller->id == 'services')],
                    ['label' => 'Видео', 'url' => '/video', 'active' => (Yii::$app->controller->id == 'video')],
                    ['label' => 'О нас', 'url' => '/about', 'active' => (Yii::$app->request->get('slug') == 'about')],
                    ['label' => 'Контакты', 'url' => '/contacts', 'active' => (Yii::$app->controller->action->id == 'contacts')],
                    ['label' => 'Блог', 'url' => ['/blog'], 'active' => (Yii::$app->controller->id == 'blog')],
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
            <p><b>Звоните нам:</b><br><i class="glyphicon glyphicon-earphone"></i>&nbsp; <?= Yii::$app->params['phone'] ?></p>
        </div>
        © <?= Yii::$app->name ?>
    </div>
</footer>
<?= $this->render('_counters') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
