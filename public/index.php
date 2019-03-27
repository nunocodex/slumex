<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new \NunoCodex\Slumex\Container\Container();

$app
    ->register(new \NunoCodex\Slumex\ServiceProvider\DotEnv(), [
        'dot_env.path' => __DIR__
    ])
    
    ->register(new \NunoCodex\Slumex\ServiceProvider\Config(), [
        'config.defaults' => include __DIR__ . '/config.php'
    ])
;

dump($app, $_ENV, $app->get('config'));

echo microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
