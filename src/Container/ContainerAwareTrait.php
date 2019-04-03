<?php

namespace NunoCodex\Slumex\Container;

/**
 * ContainerAwareTrait
 */
trait ContainerAwareTrait
{
    /**
     * Container
     *
     * @var ContainerInterface|\Pimple\Container|Container
     */
    protected $container;
    
    /**
     * @return Container|ContainerInterface|\Pimple\Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set Container
     *
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }
}
