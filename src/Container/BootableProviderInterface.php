<?php

namespace NunoCodex\Slumex\Container;

/**
 * Interface BootableProviderInterface
 * @package NunoCodex\Slumex\Container
 */
interface BootableProviderInterface
{
    /**
     * Boot Service Provider
     */
    public function boot();
}
