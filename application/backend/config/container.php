<?php

use mougrim\yii2ContainerConfigurator\ContainerConfigurator;

return [
    // your di container config

    'frontend.controllers.Base' => [
        'class' => \backend\controllers\BaseController::class,
        'arguments' => [
            2 => [ // argument number
                'id' => 'backend\models\SiteConfigService',
                'type' => ContainerConfigurator::ARGUMENT_TYPE_REFERENCE,
            ],
        ],
    ],

    'backend.controllers.Site' => [
        'class' => \backend\controllers\SiteController::class,
        'arguments' => [
            2 => [ // argument number
                'id' => 'backend\models\SiteConfigService',
                'type' => ContainerConfigurator::ARGUMENT_TYPE_REFERENCE,
            ],
        ],
    ],

    'backend.controllers.User' => [
        'class' => \backend\controllers\UserController::class,
        'arguments' => [
            2 => [ // argument number
                'id' => 'backend\models\UserService',
                'type' => ContainerConfigurator::ARGUMENT_TYPE_REFERENCE,
            ],
        ],
    ],
];
