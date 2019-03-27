<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Interface HookAwareInterface
 * @package NunoCodex\Slumex\WordPress
 */
interface HookAwareInterface
{
    /**
     * Add a WordPress filter.
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool true
     */
    function addFilter($hook, $method, $priority = 10, $arg_count = 1);
    
    /**
     * Add a WordPress action.
     *
     * This is an alias of add_filter().
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool true
     */
    function addAction($hook, $method, $priority = 10, $arg_count = 1);
    
    /**
     * Remove a WordPress filter.
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool Whether the function existed before it was removed.
     */
    function removeFilter($hook, $method, $priority = 10, $arg_count = 1);
    
    /**
     * Remove a WordPress action.
     *
     * This is an alias of remove_filter().
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool Whether the function is removed.
     */
    function removeAction($hook, $method, $priority = 10, $arg_count = 1);
    
    /**
     * Get a unique ID for a hook based on the internal method, hook, and priority.
     *
     * @param  string $hook
     * @param  string $method
     * @param  int    $priority
     * @return bool|string
     */
    function getWpFilterId($hook, $method, $priority);
    
    /**
     * Map a filter to a closure that inherits the class' internal scope.
     *
     * This allows hooks to use protected and private methods.
     *
     * @param  $id
     * @param  $method
     * @param  $arg_count
     * @return \Closure The callable actually attached to a WP hook
     */
    function mapFilter($id, $method, $arg_count);
}
