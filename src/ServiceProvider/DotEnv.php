<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;

/**
 * Class DotEnv
 * @package NunoCodex\Slumex\ServiceProvider
 */
class DotEnv implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     *
     */
    public function register()
    {
        $container = $this->getContainer();

        if (!$container->has('dot_env.path')) {
            return;
        }

        $path = $container->get('dot_env.path');
        
        

        if (!file_exists($path . '/.env')) {
            return;
        }

        (\Dotenv\Dotenv::create($container->get('dot_env.path')))->load();
    }
}
