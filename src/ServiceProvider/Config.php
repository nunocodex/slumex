<?php

namespace NunoCodex\Slumex\ServiceProvider;

use Illuminate\Config\Repository;
use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;

/**
 * Class Config
 * @package NunoCodex\Slumex\ServiceProvider
 */
class Config implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        $this->container['config.defaults'] = [];
    
        $this->container['config'] = function (Container $container) {
            return new Repository($container->get('config.defaults'));
        };
    }
    
}