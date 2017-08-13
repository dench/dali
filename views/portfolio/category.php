<?php
use yii\widgets\ListView;

/** @var $this yii\web\View */
/** @var $model app\models\Page */
/** @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label' => 'Портфолио',
    'url' => ['portfolio/index'],
];
$this->params['breadcrumbs'][] = '';
?>
<div class="container">
    <h1><?= $model->h1 ?></h1>
    <?= $model->text ?>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "<div class=\"row cards\">{items}</div>\n<div class=\"clear-pager text-center\">{pager}</div>",
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
    ]);
    ?>
</div>