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
        $container = $this->getContainer();

        $container['api.points.client'] = function (Container $c) {
            return new Client([
                'base_uri' => $c->get('api.points.client.base_uri')
            ]);
        };
    }
}
