<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'controllerNamespace' => 'frontend\controllers',
    //'defaultRoute' => 'front',
    'layout'=> 'main',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => 'news/<id:\d{1,4}>',
                    'route' => 'news/views',
                    'suffix' => '.html',
                ],
                'news/all'=> 'news/index',
                [
                    'pattern' => 'stat/<id:\d{1,4}>',
                    'route' => 'articles/views',
                    'suffix' => '.html',
                ],
                'articles/all'=> 'articles/index',
                'customers'=> 'articles/customers',
                'suppliers'=> 'articles/suppliers',
                '44fz'=> 'articles/44fz',
                '223fz'=> 'articles/223fz',
                'purchase'=> 'articles/purchase',
                'services'=> 'articles/services',
                'law'=> 'articles/law',
                'world'=> 'articles/world',
                'analytics'=> 'articles/analytics',
                'events'=> 'articles/events',
            ],
        ],

    ],
    'params' => $params,
];
