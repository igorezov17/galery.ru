<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // 'aliases' => [
    //     '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    //     ],
    'defaultRoute' => 'site/index',
    'language' => 'ru',
    //'layout' => 'maybe',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache' //Включаем кеширование 
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-enDh6-avrkwO4kqWuYXAKWBak40AbCi',
            'baseUrl' => '',
            'enableCsrfValidation' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\login\users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:[-\w]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller>/<id:\d+>/<action:\w+>' => '<controller>/<action>',


                '/' => 'image/index',
                '/image/delete/<id:\d+>/' => '/image/delete',
                '/image/ratota/<id:\d+>' => '/image/ratota',

                '/user' => '/user/info',

                //admin
                '/admin/users/'=>'/admin/users/index',
                '/admin/users/delete/<id:\d+>'=>'/admin/users/delete',

                '/admin/posts/'=>'/admin/posts/index',
                '/admin/posts/edit/'=>'/admin/posts/edit/',
                '/admin/posts/update/<id:\d+>'=>'/admin/posts/update/',
                '/admin/posts/delete/<id:\d+>'=>'/admin/posts/delete/',


                '/admin/image/'=>'/admin/image/index',
                '/admin/images/edit/'=>'/admin/images/edit',
                '/admin/images/update/<id:\d+>'=>'/admin/images/update',
                '/admin/images/delete/<id:\d+>'=>'/admin/images/delete',
 
            ],
        ],
        
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\dmn',
            // 'layout' => 'main',
        ],
        'forum' => [
            'class' => 'app\modules\forum\frm',
        ],
        
    ],

    // ],
    // 'aliases' => [
    //     '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    // ],
    'params' => $params,



];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
