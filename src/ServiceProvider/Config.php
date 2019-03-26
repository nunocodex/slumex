<?php

namespace NunoCodex\Slumex\ServiceProvider;

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
        $container = $this->getContainer();
        
        if (!$container->has('config.defaults')) {
            return;
        }
        
        $container['config'] = function (Container $c) {
            return new \Noodlehaus\Config($c->get('config.defaults'));
        };
    }
    
}