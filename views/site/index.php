<?php

/* @var $this yii\web\View */
/* @var $items app\models\Page[] */

use dench\image\helpers\ImageHelper;
use yii\helpers\Url;

?>
<div class="container">
    <!--<h1><?= $this->params['page']->h1 ?></h1>-->

    <div class="row">
        <?php foreach ($items as $item) : ?>
            <div class="col-xs-6 col-md-4 card block-link">
                <div class="card-content">
                    <h3><a href="<?= Url::to(['portfolio/view', 'slug' => $item->slug]) ?>" class="card-photo"><?= $item->name ?></a></h3>
                </div>
                <img src="<?= $item->cover ?>" alt="" class="img-responsive">
            </div>
        <?php endforeach; ?>
    </div>

    <?= $this->params['page']->text ?>

    <?php

    echo ImageHelper::thumb(5,'small');

    echo "<br>";

    echo ImageHelper::thumb(5,'small');

    echo "<br>";

    echo \yii\helpers\StringHelper::basename('dench.jpg', 'jpg');

    ?>
</div>