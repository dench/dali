<?php

namespace app\controllers;

use app\models\Home;
use dench\page\models\Page;
use Yii;
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
        $page = Page::viewPage(Yii::$app->params['page']['index']);

        $items = Home::findEnabled();

        return $this->render('index', [
            'items' => $items,
            'page' => $page,
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionPage($slug = null)
    {
        $page = Page::viewPage($slug);

        return $this->render('page', [
            'page' => $page,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContacts()
    {
        $page = Page::viewPage(Yii::$app->params['page']['contacts']);

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'page' => $page,
        ]);
    }
}
