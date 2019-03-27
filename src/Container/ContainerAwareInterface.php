<?php

namespace NunoCodex\Slumex\Container;

/**
 * Interface ContainerAwareInterface
 * @package NunoCodex\Slumex\Container
 */
interface ContainerAwareInterface
{
    /**
     * @param ContainerInterface $container
     * @return ContainerInterface
     */
    public function setContainer(ContainerInterface $container);
}
