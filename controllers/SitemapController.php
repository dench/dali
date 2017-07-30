<?php

namespace app\controllers;

use app\models\Page;
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
            'loc' => Url::to(['blog/index'], 'https'),
        ];

        $urls[] = [
            'loc' => Url::to(['/portfolio'], 'https'),
        ];

        $model = Page::findOne(2);

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

        $urls[] = [
            'loc' => Url::to(['/services'], 'https'),
        ];

        $model = Page::findOne(3);

        $childs = $model->getChilds()->where(['enabled' => 1])->all();

        foreach ($childs as $child) {
            $urls[] = [
                'loc' => Url::to(['services/view', 'slug' => $child->slug], 'https'),
            ];
        }

        return $this->renderPartial('index', [
            'urls' => $urls,
        ]);
    }

}