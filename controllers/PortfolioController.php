<?php

namespace app\controllers;

use app\models\Page;
use yii\web\Controller;

class PortfolioController extends Controller
{
    public function actionIndex($slug = null, $id = null)
    {
        $model = Page::viewPage($id ? $id  : $slug);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView($slug = null, $id = null)
    {
        $model = Page::viewPage($id ? $id  : $slug);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
