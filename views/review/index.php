<?php
/* @var $this yii\web\View */
/* @var $page \dench\page\models\Page */
/* @var $dataProvider yii\debug\models\timeline\DataProvider */

use yii\widgets\ListView;
?>
<div class="container">
    <h1 class="title"><?= $page->h1 ?></h1>
    <?= $page->short ?>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}\n<div class=\"clear-pager text-center\">{pager}</div>",
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
        'options' => ['class' => 'reviews'],
    ]);
    ?>

    <?= $page->text ?>
</div>
