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

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     * @param mixed $default Default value.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id, $default = null);
}
