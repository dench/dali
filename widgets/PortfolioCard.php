<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 11.03.18
 * Time: 15:03
 */

namespace app\widgets;

use dench\page\models\Page;
use yii\base\Widget;

class PortfolioCard extends Widget
{
    /**
     * @var $model Page
     */
    public $model;

    public function run()
    {
        return $this->render('portfolioCard', [
            'model' => $this->model,
        ]);
    }
}