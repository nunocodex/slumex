<?php

namespace NunoCodex\Slumex\ServiceProvider;

use GuzzleHttp\Client;
use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;

/**
 * Class GuzzleHttp
 * @package NunoCodex\Slumex\ServiceProvider
 */
class GuzzleHttp implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Register Service Provider
     */
    public function register()
    {
        $this->container['guzzle.client.options'] = [];
        
        $this->container['guzzle.client'] = $this->container->factory(function (Container $container) {
            return new Client($container->get('guzzle.client.options'));
        });
    }
}
