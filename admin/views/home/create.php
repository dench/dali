<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Home */

$this->title = Yii::t('app', 'Create block');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
