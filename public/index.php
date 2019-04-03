<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * @param null|string $id
 * @return mixed|\NunoCodex\Slumex\Container\Container
 */
function App($id = null)
{
    static $app_container;
    
    if (!$app_container) {
        $app_container = new \NunoCodex\Slumex\Container\Container();
    }
    
    if (null !== $id and $app_container->has($id)) {
        return $app_container->get($id);
    }
    
    return $app_container;
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

dump(App(), $_ENV);

echo "Time elapsed: " . microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
