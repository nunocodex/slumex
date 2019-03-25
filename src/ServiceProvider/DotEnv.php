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
    
        if (!$container->has('dotenv.path')) {
            return;
        }
        
        $path = $container->get('dotenv.path');
        
        if (!file_exists($path . '/.env')) {
            return;
        }
        
        (\Dotenv\Dotenv::create($container->get('dotenv.path')))->load();
    }
}
