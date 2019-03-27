<?php

namespace NunoCodex\Slumex\Container;

/**
 * Interface ContainerAwareInterface
 * @package NunoCodex\Slumex\Container
 */
interface ContainerAwareInterface
{
    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface;
    
    /**
     * @param ContainerInterface $container
     * @return ContainerInterface
     */
    public function setContainer(ContainerInterface $container);
}
