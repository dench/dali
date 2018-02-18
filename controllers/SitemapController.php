<?php

namespace app\controllers;

use dench\page\models\Page;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class SitemapController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');

        $urls = [];

        $urls[] = [
            'loc' => Url::home('https'),
        ];

        $urls[] = [
            'loc' => Url::to(['site/contacts'], 'https'),
        ];

        $urls[] = [
            'loc' => Url::to(['site/page', 'slug' => 'about'], 'https'),
        ];

        $urls[] = [
            'loc' => Url::to(['blog/index'], 'https'),
        ];

        if ($model = Page::findOne(Yii::$app->params['page']['blog'])) {
            $childs = $model->getChilds()->where(['enabled' => 1])->all();

            foreach ($childs as $child) {
                $urls[] = [
                    'loc' => Url::to(['blog/view', 'slug' => $child->slug], 'https'),
                ];
            }
        }

        $urls[] = [
            'loc' => Url::to(['/portfolio'], 'https'),
        ];

        if ($model = Page::findOne(Yii::$app->params['page']['portfolio'])) {
            $childs = $model->getChilds()->where(['enabled' => 1])->all();

            foreach ($childs as $child) {
                $urls[] = [
                    'loc' => Url::to(['portfolio/category', 'slug' => $child->slug], 'https'),
                ];
                $projects = $child->getChilds()->where(['enabled' => 1])->all();
                foreach ($projects as $project) {
                    $urls[] = [
                        'loc' => Url::to(['portfolio/view', 'slug' => $project->slug], 'https'),
                    ];
                }
            }
        }

        $urls[] = [
            'loc' => Url::to(['video/index'], 'https'),
        ];

        if ($model = Page::findOne(Yii::$app->params['page']['video'])) {
            $childs = $model->getChilds()->where(['enabled' => 1])->all();

            foreach ($childs as $child) {
                $urls[] = [
                    'loc' => Url::to(['video/view', 'slug' => $child->slug], 'https'),
                ];
            }
        }

        return $this->renderPartial('index', [
            'urls' => $urls,
        ]);
    }

}