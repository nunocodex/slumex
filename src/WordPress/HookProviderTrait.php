<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Trait HookProviderTrait
 * @package NunoCodex\Slumex\WordPress
 */
trait HookProviderTrait
{
    /**
     * Internal property to track closures attached to WordPress hooks.
     *
     * @var array
     */
    protected $filter_map = [];

    /**
     * Add a WordPress filter.
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool true
     */
    public function addFilter($hook, $method, $priority = 10, $arg_count = 1)
    {
        return add_filter(
            $hook,
            $this->mapFilter($this->getWpFilterId($hook, $method, $priority), $method, $arg_count),
            $priority,
            $arg_count
        );
    }

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
    public function addAction($hook, $method, $priority = 10, $arg_count = 1)
    {
        return $this->addFilter($hook, $method, $priority, $arg_count);
    }

    /**
     * Remove a WordPress filter.
     *
     * @param  string   $hook
     * @param  callable $method
     * @param  int      $priority
     * @param  int      $arg_count
     * @return bool Whether the function existed before it was removed.
     */
    public function removeFilter($hook, $method, $priority = 10, $arg_count = 1)
    {
        return remove_filter(
            $hook,
            $this->mapFilter($this->getWpFilterId($hook, $method, $priority), $method, $arg_count),
            $priority,
            $arg_count
        );
    }

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
    public function removeAction($hook, $method, $priority = 10, $arg_count = 1)
    {
        return $this->removeFilter($hook, $method, $priority, $arg_count);
    }

    /**
     * Get a unique ID for a hook based on the internal method, hook, and priority.
     *
     * @param  string $hook
     * @param  callable $method
     * @param  int    $priority
     * @return bool|string
     */
    public function getWpFilterId($hook, $method, $priority)
    {
        return _wp_filter_build_unique_id($hook, $method, $priority);
    }

    /**
     * Map a filter to a closure that inherits the class' internal scope.
     *
     * This allows hooks to use protected and private methods.
     *
     * @param  string $id
     * @param  callable $method
     * @param  int $arg_count
     * @return \Closure The callable actually attached to a WP hook
     */
    public function mapFilter($id, $method, $arg_count)
    {
        if (empty($this->filter_map[$id])) {
            $this->filter_map[$id] = function () use ($method, $arg_count) {
                return call_user_func_array($method, array_slice(func_get_args(), 0, $arg_count));
            };
        }

        return $this->filter_map[$id];
    }
}
