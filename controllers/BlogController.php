<?php

namespace app\controllers;

use dench\page\models\Page;
use Yii;
use yii\data\ActiveDataProvider;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $page = Page::viewPage(Yii::$app->params['page']['blog']);

        $dataProvider = new ActiveDataProvider([
            'query' => $page->getChilds()->where(['enabled' => 1]),
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_ASC,
                ],
            ],
            'pagination' => [
                'defaultPageSize' => 9,
            ],
        ]);

        return $this->render('index', [
            'page' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug = null)
    {
        $page = Page::viewPage($slug);

        return $this->render('view', [
            'page' => $page,
        ]);
    }

}
