<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uk',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'baseUrl' => '',
            'cookieValidationKey' => 'kTIWbikuG8GZhQmCeP9ZM7d0x80mW6uF',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
                'product-category/<id:\d+>' => 'product-category/view',
                'cart/add/<id:\d+>' => 'cart/add',
                'cart/min/<id:\d+>' => 'cart/min',
                'cart/remove/<id:\d+>' => 'cart/remove',
                'cart' => 'cart/index',
                'cart/checkout' => 'cart/checkout',
                'cart/success/<id:\d+>' => 'cart/success',
                'product/<id:\d+>' => 'product/view',
                'news/<id:\d+>' => 'news/view',
                'brand/<id:\d+>' => 'brand/view',
                'cart/manyadd/<id:\d+>' => 'cart/manyadd',
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            'routes' => [
                'baseUrl' => '',
                'basePath' => '@webroot',
                'uploadPath' => 'uploads',
            ],
            'thumbs' => [
                'small' => [
                    'name' => 'Малий',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 'Середній',
                    'size' => [300, 200],
                ],
                'large' => [
                    'name' => 'Великий',
                    'size' => [500, 400],
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
