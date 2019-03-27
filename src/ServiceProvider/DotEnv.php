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
     * Register Service Provider
     */
    public function register()
    {
        if (!$this->container->hasParameter('dot_env.path')) {
            return;
        }

        $path = $this->container->getParameter('dot_env.path');
        
        if (!file_exists($path . '/.env')) {
            return;
        }

        (\Dotenv\Dotenv::create($this->container->getParameter('dot_env.path')))->load();
    }
}
