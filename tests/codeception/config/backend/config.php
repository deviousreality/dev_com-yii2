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

return [
    'bootstrap' => [
        'containerConfigurator'
    ],
    'controllerMap' => [
        'site' => 'backend.controllers.Site',
        'user' => 'backend.controllers.User'
    ],
];