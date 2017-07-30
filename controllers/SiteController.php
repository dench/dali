<?php

namespace app\controllers;

use app\models\Page;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Page::viewPage(1);

        $items = Page::find()->where(['home' => 1])->all();

        return $this->render('index', [
            'items' => $items,
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionPage($slug = null)
    {
        Page::viewPage($slug);

        return $this->render('page');
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionServices()
    {
        $model = Page::viewPage(3);

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

        return $this->render('services', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContacts()
    {
        Page::viewPage(12);

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}
