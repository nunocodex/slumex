<?php

namespace NunoCodex\Slumex\WordPress;

use NunoCodex\Slumex\Container\Container;

/**
 * Class Addon
 * @package NunoCodex\Slumex\WordPress
 */
abstract class Addon extends Container implements AddonInterface
{
    /**
     * Addon constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $values = [
            'filename'  => $filename,
            'slug'      => basename(dirname($filename))
        ];
        
        parent::__construct($values);
    }
}
