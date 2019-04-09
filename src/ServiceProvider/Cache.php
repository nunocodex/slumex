<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use Symfony\Component\Cache\Adapter\SimpleCacheAdapter;
use Symfony\Component\Cache\Simple\FilesystemCache;

/**
 * Class Cache
 * @package NunoCodex\Slumex\ServiceProvider
 */
class Cache implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        $container = $this->getContainer();
        
        $container['cache.pool'] = function (Container $container) {
            return new FilesystemCache();
        };
        
        $container['cache.adapter'] = function (Container $container) {
            return new SimpleCacheAdapter($container['cache.pool']);
        };
        
        $container['cache'] = function (Container $container) {
            return new $container['cache.adapter'];
        };
    }
}
