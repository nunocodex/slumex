<?php

namespace NunoCodex\Slumex\WordPress;

use NunoCodex\Slumex\Container\ContainerInterface;

/**
 * Interface AddonInterface
 * @package NunoCodex\Slumex\WordPress
 */
interface AddonInterface
{
    /**
     * @param HookProviderInterface $provider
     * @param array $values
     * @return ContainerInterface
     */
    public function registerHook(HookProviderInterface $provider, array $values = []): ContainerInterface;
}
