<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Simple\Psr6Cache;

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
        
        $container['cache.pool.namespace'] = '';
        
        $container['cache.pool.default_lifetime'] = 0;
        
        $container['cache.pool.directory'] = null;
        
        $container['cache.pool'] = function (Container $container) {
            return new FilesystemAdapter(
                $container['cache.pool.namespace'],
                $container['cache.pool.default_lifetime'],
                $container['cache.pool.directory']
            );
        };
        
        $container['cache.adapter'] = function (Container $container) {
            return new Psr6Cache($container['cache.pool']);
        };
        
        $container['cache'] = function (Container $container) {
            return $container['cache.adapter'];
        };
    }
}
