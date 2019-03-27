<?php

namespace NunoCodex\Slumex\ServiceProvider;

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
        if (!$this->container->hasParameter('config.defaults')) {
            return;
        }
        
        $this->container
            ->register('config', \Noodlehaus\Config::class)
            ->addArgument('%config.defaults%');
    }
}
