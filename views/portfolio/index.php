<?php
use yii\widgets\ListView;

/** @var $this yii\web\View */
/** @var $page dench\page\models\Page */
/** @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="container">
    <h1 class="title"><?= $page->h1 ?></h1>

    <?= $page->short ?>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_category',
        'layout' => "<div class=\"row cards\">{items}</div>\n<div class=\"clear-pager text-center\">{pager}</div>",
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
        'viewParams' => [
            'hello' => 'dench',
        ],
    ]);
    ?>

    <?= $page->text ?>
</div>
