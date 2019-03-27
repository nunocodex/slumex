<?php

namespace NunoCodex\Slumex\Container;

use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Interface ContainerInterface
 * @package NunoCodex\Slumex\Container
 */
interface ContainerInterface extends PsrContainerInterface
{
    /**
     * @param ServiceProviderInterface $provider
     * @param array $values
     * @return ContainerInterface
     */
    public function register(ServiceProviderInterface $provider, array $values = []);
}
