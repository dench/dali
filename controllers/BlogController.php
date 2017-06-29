<?php

namespace app\controllers;

use app\models\Page;
use yii\data\ActiveDataProvider;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Page::viewPage(13);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getChilds()->where(['enabled' => 1]),
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
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug = null, $id = null)
    {
        Page::viewPage($slug);

        return $this->render('view');
    }

}
