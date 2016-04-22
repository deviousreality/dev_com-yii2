<?php

use yii\di\Container;
use mougrim\yii2ContainerConfigurator\ContainerConfigurator;

Yii::$container->set(
    'containerConfigurator',
    function (Container $container) {
        $containerConfigurator = new ContainerConfigurator($container);
        $containerConfigurator->configure(require __DIR__ . '/container.php'); // di container config path
        return $containerConfigurator;
    }
);

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerMap' => [
        'blog' => 'backend.controllers.Blog',
        'site' => 'backend.controllers.Site',
        'user' => 'backend.controllers.User'
    ],
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'containerConfigurator'
    ],
    'modules' => [],
    'components' => [
        'containerConfigurator' => 'containerConfigurator',
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'rules' => [
                'login' => 'site/login',
                'logout' => 'site/logout'
            ]
        ]
    ],
    'homeUrl' => ['site/login'],
    'params' => $params,

];
