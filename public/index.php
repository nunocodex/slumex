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
    
    ->register(new \NunoCodex\Slumex\ServiceProvider\Cache())
;

/** @var \Symfony\Component\Templating\EngineInterface $templater */
$templater = App('templater');

/** @var \Psr\SimpleCache\CacheInterface $cache */
$cache = App('cache');

if (!$cache->has('templater.data')) {
    $cache->set('templater.data', [
        'title' => 'Page Title',
        'body' => 'Page Body'
    ]);
}

echo $templater->render('homepage.php', $cache->get('templater.data'));

dump(App(), $_ENV, App('templater.path_patterns'));

echo "Time elapsed: " . microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
