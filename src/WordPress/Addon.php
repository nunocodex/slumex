<?php

namespace NunoCodex\Slumex\WordPress;

use NunoCodex\Slumex\Container\Container;

/**
 * Class Addon
 * @package NunoCodex\Slumex\WordPress
 */
class Addon extends Container implements AddonInterface
{
    /**
     * Addon constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach ($values as $k => $v) {
            $this->offsetSet($k, $v);
        }
    }
}
