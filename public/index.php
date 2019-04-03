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
    
    ->register(new \NunoCodex\Slumex\ServiceProvider\Templater(), [
        'templater.path_patterns' => __DIR__ . env('templater.path_patterns')
    ])
;

/** @var \Symfony\Component\Templating\EngineInterface $templater */
$templater = $app->get('templater');

echo $templater->render('homepage.php', [
    'title' => 'Page Title',
    'body' => 'Page Body'
]);

dump($app, $_ENV);

echo microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
