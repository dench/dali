<?php
/** @var $this yii\web\View */
/** @var $model app\models\Page */
/** @var $dataProvider yii\data\ActiveDataProvider */

use yii\widgets\ListView;

?>
<div class="container">
    <h1 class="title"><?= $this->params['page']->h1 ?></h1>

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

    <?= $this->params['page']->text ?>
</div>