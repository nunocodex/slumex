<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new \NunoCodex\Slumex\Container\Container();

$app->registerService(new \NunoCodex\Slumex\ServiceProvider\DotEnv(), [
    'dotenv.path' => __DIR__
]);

dump($app, $_ENV);