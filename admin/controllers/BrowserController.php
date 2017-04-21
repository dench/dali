<?php

namespace app\admin\controllers;

use app\models\PageBase;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BrowserController extends Controller
{
    public $layout = 'browser';

    public function actionIndex($id)
    {
        $model = $this->findModel($id);

        return $this->render('index', [
            'images' => $model->images,
        ]);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PageBase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PageBase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
