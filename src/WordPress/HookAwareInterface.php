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
     * @param string $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    function addFilter(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1);
    
    /**
     * @param string $hook
     * @param object|null $component
     * @param string $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    function addAction(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1);
    
    /**
     * @param string $tag
     * @param object|null $component
     * @param string $callback
     * @return $this
     */
    function addShortcode(string $tag, $component, string $callback);
    
    /**
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int $priority
     * @return $this
     */
    function removeFilter(string $hook, $component, string $callback, int $priority = 10);
    
    /**
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int $priority
     * @return $this
     */
    function removeAction(string $hook, $component, string $callback, int $priority = 10);
}
