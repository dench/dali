<?php

namespace app\controllers;

use app\models\Page;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PortfolioController extends Controller
{
    public function actionCategory($slug)
    {
        $model = Page::viewPage($slug);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getChilds(),
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
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug = null)
    {
        $model = Page::viewPage($slug);

        $back = Yii::$app->request->referrer;

        if (!strpos($back, Yii::$app->request->serverName)) {
            $back = '/' . $model->parent->slug;
        }

        return $this->render('view', [
            'model' => $model,
            'back' => $back,
        ]);
    }

}
