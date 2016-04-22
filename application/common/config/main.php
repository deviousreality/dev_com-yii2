<?php
return [
    'bootstrap' => [
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false, //http://www.yiiframework.com/doc-2.0/yii-web-urlmanager.html#$enableStrictParsing-detail
            'rules' => [
                // ...
            ],
        ],
    ],
    'runtimePath' => dirname(dirname(__DIR__)) . '/../runtime',
    'vendorPath' => dirname(dirname(__DIR__)) . '/../vendor',
];
