<?php
/** @var $this yii\web\View */
/** @var $page dench\page\models\Page*/

$this->params['breadcrumbs'][] = [
    'label' => 'Видео',
    'url' => ['video/index'],
];
$this->params['breadcrumbs'][] = '';
?>
<div class="container blog">
    <h1><?= $page->h1 ?></h1>

    <?= $page->text ?>
</div>