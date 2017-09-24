<?php
/** @var $this yii\web\View */
/** @var $model app\models\Page */

$this->params['breadcrumbs'][] = [
    'label' => 'Видео',
    'url' => ['video/index'],
];
$this->params['breadcrumbs'][] = '';
?>
<div class="container blog">
    <h1><?= $this->params['page']->h1 ?></h1>

    <?= $this->params['page']->text ?>
</div>