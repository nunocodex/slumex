<?php

namespace NunoCodex\Slumex\WordPress;

use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerInterface;

/**
 * Class Addon
 * @package NunoCodex\Slumex\WordPress
 */
class Addon extends Container implements AddonInterface
{
    /**
     * @param HookProviderInterface $provider
     * @param array $values
     * @return ContainerInterface|$this
     */
    public function registerHook(HookProviderInterface $provider, array $values = [])
    {
        return $this->registerProvider($provider, $values);
    }
}
