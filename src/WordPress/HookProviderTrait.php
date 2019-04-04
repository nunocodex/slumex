<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Trait HookProviderTrait
 * @package NunoCodex\Slumex\WordPress
 */
trait HookProviderTrait
{
    /**
     * @param string $hook
     * @param object|null $component
     * @param string $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addFilter(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1)
    {
        add_filter(
            $hook,
            $this->getCallable($component, $callback),
            $priority,
            $accepted_args
        );
        
        return $this;
    }
    
    /**
     * @param string $hook
     * @param object|null $component
     * @param string $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addAction(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1)
    {
        add_action(
            $hook,
            $this->getCallable($component, $callback),
            $priority,
            $accepted_args
        );
        
        return $this;
    }
    
    /**
     * @param string $tag
     * @param object|null $component
     * @param string $callback
     * @return $this
     */
    public function addShortcode(string $tag, $component, string $callback)
    {
        add_shortcode(
            $tag,
            $this->getCallable($component, $callback)
        );
        
        return $this;
    }
    
    /**
     * @param string $hook
     * @param object|null $component
     * @param string $callback
     * @param int $priority
     * @return $this
     */
    public function removeFilter(string $hook, $component, string $callback, int $priority = 10)
    {
        remove_filter(
            $hook,
            $this->getCallable($component, $callback),
            $priority
        );
        
        return $this;
    }
    
    /**
     * @param string $hook
     * @param object|null $component
     * @param string $callback
     * @param int $priority
     * @return $this
     */
    public function removeAction(string $hook, $component, string $callback, int $priority = 10)
    {
        remove_action(
            $hook,
            $this->getCallable($component, $callback),
            $priority
        );
        
        return $this;
    }
    
    /**
     * @param object|null $component
     * @param string $callback
     * @return array|string
     */
    private function getCallable($component, string $callback)
    {
        if (null === $component) {
            return $callback;
        }
        
        return [$component, $callback];
    }
}
