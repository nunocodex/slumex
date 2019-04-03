<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\BootableProviderInterface;
use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;

/**
 * Class DotEnv
 * @package NunoCodex\Slumex\ServiceProvider
 */
class DotEnv implements ServiceProviderInterface, BootableProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Register Service Provider
     */
    public function register()
    {
        $this->container['dot_env.path'] = '/';

        $this->container['dot_env'] = function (Container $container) {
            return \Dotenv\Dotenv::create($container->get('dot_env.path'));
        };
    }
    
    /**
     * Boot Service Provider
     */
    public function boot()
    {
        $this->container->get('dot_env')->load();
    }
}
