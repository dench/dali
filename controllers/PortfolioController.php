<?php

namespace app\controllers;

use dench\page\models\Page;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PortfolioController extends Controller
{
    public function actionIndex()
    {
        $page = Page::viewPage(Yii::$app->params['page']['portfolio']);

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

    public function actionCategory($slug)
    {
        $page = Page::viewPage($slug);

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

        return $this->render('category', [
            'page' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug = null)
    {
        $page = Page::viewPage($slug);

        $back = Yii::$app->request->referrer;

        if (!strpos($back, Yii::$app->request->serverName)) {
            $back = '/' . $page->parent->slug;
        }

        return $this->render('view', [
            'page' => $page,
            'back' => $back,
        ]);
    }

}
