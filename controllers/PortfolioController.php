<?php

namespace app\controllers;

use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PortfolioController extends Controller
{
    public function actionCategory($slug)
    {
        $model = Page::viewPage($slug);

        return $this->render('category', [
            'model' => $model,
        ]);
    }

    public function actionView($slug = null, $id = null)
    {
        $model = Page::viewPage($slug);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
