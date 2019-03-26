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
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Get Container
     *
     * @return ContainerInterface|Container
     */
    public function getContainer(): ContainerInterface
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
