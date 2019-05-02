<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Interface AddonInterface
 * @package NunoCodex\Slumex\WordPress
 */
interface AddonInterface
{
    /**
     * AddonInterface constructor.
     * @param string $filename
     */
    public function __construct(string $filename);

    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return $this
     */
    public function activate($component, $callback);

    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return $this
     */
    public function deactivate($component, $callback);
}
