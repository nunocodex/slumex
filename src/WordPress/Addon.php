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
            'filename' => $filename,
            'slug' => basename(dirname($filename))
        ];

        parent::__construct($values);
    }

    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return array|string
     */
    protected function getCallable($component, $callback)
    {
        if (null === $component) {
            return $callback;
        }

        return [$component, $callback];
    }

    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return $this
     */
    public function activate($component, $callback)
    {
        register_activation_hook($this->get('filename'), $this->getCallable($component, $callback));

        return $this;
    }

    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return $this
     */
    public function deactivate($component, $callback)
    {
        register_deactivation_hook($this->get('filename'), $this->getCallable($component, $callback));

        return $this;
    }
}
