<?php

namespace app\controllers;

use dench\page\models\Page;
use Yii;
use yii\web\Controller;

class ReviewController extends Controller
{
    public function actionIndex()
    {
        $page = Page::viewPage(Yii::$app->params['page']['reviews']);

        return $this->render('index', [
            'page' => $page,
        ]);
    }
}
