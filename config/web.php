<?php

$config = [
    'id' => 'app',
    'defaultRoute' => 'site/index',
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'request' => [
            'class' => 'dench\language\LangRequest'
        ],
        'urlManager' => [
            'class' => 'app\components\UrlManager',
            'defaultLanguage' => 'ru',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
            ],
            'rules' => [
                '' => 'site/index',
                '<action:(contacts)>' => 'site/<action>',
                '<slug:about>' => 'site/page',
                'image/<size:[0-9a-z\-]+>/<name>.<extension:[a-z]+>' => 'image/default/index',
                'portfolio/' => 'portfolio/index',
                'portfolio/<slug:new-year>' => 'portfolio/view',
                'portfolio/<slug:[0-9a-z\-]+>' => 'portfolio/category',
                'project/<slug:[0-9a-z\-]+>' => 'portfolio/view',
                'blog' => 'blog/index',
                'blog/<slug:[0-9a-z\-]+>' => 'blog/view',
                'video' => 'video/index',
                'video/<slug:[0-9a-z\-]+>' => 'video/view',
                'reviews/' => 'review/index',
                'sitemap.xml' => 'sitemap/index',
            ],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
