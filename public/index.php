<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

/*
$container_compiled = __DIR__ . '/.cache.container.php';

$container_config_cache = new \Symfony\Component\Config\ConfigCache($container_compiled, false);

if (!$container_config_cache->isFresh()) {
    $app = new \NunoCodex\Slumex\Container\Container();
    
    $app
        ->registerService(new \NunoCodex\Slumex\ServiceProvider\DotEnv(), [
            'dot_env.path' => __DIR__
        ])
        
        ->registerService(new \NunoCodex\Slumex\ServiceProvider\Config(), [
            'config.defaults' => __DIR__ . '/config.php'
        ])
    ;
    
    $app->compile();
    
    $dumper = new \Symfony\Component\DependencyInjection\Dumper\PhpDumper($app);
    
    $container_config_cache->write(
        $dumper->dump(['class' => 'CachedContainer']),
        $app->getResources()
    );
}

require_once $container_compiled;

$app = new CachedContainer();
*/

$app = new \NunoCodex\Slumex\Container\Container();

$app
    ->registerService(new \NunoCodex\Slumex\ServiceProvider\DotEnv(), [
        'dot_env.path' => __DIR__
    ])
    
    ->registerService(new \NunoCodex\Slumex\ServiceProvider\Config(), [
        'config.defaults' => __DIR__ . '/config.php'
    ])
;

dump($app, $_ENV, $app->get('config'));