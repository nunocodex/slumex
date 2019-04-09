<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * @param null|string $id
 * @return mixed|\NunoCodex\Slumex\Container\Container
 */
function App(string $id = null)
{
    return \NunoCodex\Slumex\Container\Container::instance($id);
}

App()
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
$templater = App('templater');

echo $templater->render('homepage.php', [
    'title' => 'Page Title',
    'body' => 'Page Body'
]);

dump(App(), $_ENV, App('templater.path_patterns'));

echo "Time elapsed: " . microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
