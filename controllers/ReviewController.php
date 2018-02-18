<?php

namespace app\controllers;

use app\models\Review;
use dench\page\models\Page;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ReviewController extends Controller
{
    public function actionIndex()
    {
        $page = Page::viewPage(Yii::$app->params['page']['reviews']);

        $dataProvider = new ActiveDataProvider([
            'query' => Review::find()->where(['enabled' => 1]),
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_ASC,
                ],
            ],
            'pagination' => [
                'defaultPageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'page' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }
}
