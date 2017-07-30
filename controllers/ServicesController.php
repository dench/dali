<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 30.07.17
 * Time: 14:22
 */

namespace app\controllers;

use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ServicesController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = Page::viewPage(3);

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

    /**
     * @return string
     */
    public function actionView($slug = null)
    {
        Page::viewPage($slug);

        return $this->render('view');
    }
}