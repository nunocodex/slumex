<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Interface HookAwareInterface
 * @package NunoCodex\Slumex\WordPress
 */
interface HookAwareInterface
{
    /**
     * @param string $hook
     * @param object|null $component
     * @param string|callable $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addFilter(string $hook, $component, $callback, int $priority = 10, int $accepted_args = 1);

    /**
     * @param string $hook
     * @param object|null $component
     * @param string|callable $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addAction(string $hook, $component, $callback, int $priority = 10, int $accepted_args = 1);

    /**
     * @param string $tag
     * @param object|null $component
     * @param string|callable $callback
     * @return $this
     */
    public function addShortcode(string $tag, $component, $callback);

    /**
     * @param string $hook
     * @param object|null $component
     * @param string|callable $callback
     * @param int $priority
     * @return $this
     */
    public function removeFilter(string $hook, $component, $callback, int $priority = 10);

    /**
     * @param string $hook
     * @param object|null $component
     * @param string|callable $callback
     * @param int $priority
     * @return $this
     */
    public function removeAction(string $hook, $component, $callback, int $priority = 10);

    /**
     * @param string $hook
     * @return bool
     */
    public function existsAction(string $hook): bool;
}
