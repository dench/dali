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
                'portfolio/<slug:[0-9a-z\-]+>' => 'portfolio/category',
                'services/<slug:[0-9a-z\-]+>' => 'site/page',
                'project/<slug:[0-9a-z\-]+>' => 'portfolio/view',
                'blog/<slug:[0-9a-z\-]+>' => 'blog/view',
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
