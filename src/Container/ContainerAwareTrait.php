<?php

namespace NunoCodex\Slumex\Container;

/**
 * Trait ContainerAwareTrait
 * @package NunoCodex\Slumex\Container
 */
trait ContainerAwareTrait
{
    /**
     * @var ContainerInterface|Container
     */
    protected $container;
    
    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
