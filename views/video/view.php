<?php
/** @var $this yii\web\View */
/** @var $model app\models\Page */
?>
<div class="container blog">
    <h1 class="title"><?= $this->params['page']->h1 ?></h1>

    <?= $this->params['page']->text ?>
</div>