<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Trait HookProviderTrait
 * @package NunoCodex\Slumex\WordPress
 */
trait HookProviderTrait
{
    private $admin = false;
    
    private $frontend = false;
    
    private $action = false;
    
    private $filter = false;
    
    public function admin()
    {
        $this->admin = true;
        
        return $this;
    }
    
    public function frontend()
    {
        $this->frontend = true;
        
        return $this;
    }
    
    public function filter()
    {
        $this->filter = true;
        
        return $this;
    }
    
    public function action()
    {
        $this->action = true;
        
        return $this;
    }
    
    public function add(string $hook, $component, $callback, int $priority = 10, int $accepted_args = 1)
    {
        if ($this->admin and is_admin()) {
            
        } elseif ($this->frontend and !is_admin()) {
        
        } else {
        
        }
    }
    
    /**
     * @param string $hook
     * @param object|null $component
     * @param string|callable $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addFilter(string $hook, $component, $callback, int $priority = 10, int $accepted_args = 1)
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
     * @param string|callable $callback
     * @param int $priority
     * @param int $accepted_args
     * @return $this
     */
    public function addAction(string $hook, $component, $callback, int $priority = 10, int $accepted_args = 1)
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
     * @param string|callable $callback
     * @return $this
     */
    public function addShortcode(string $tag, $component, $callback)
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
     * @param string $hook
     * @return bool
     */
    public function existsAction(string $hook): bool
    {
        return did_action($hook);
    }
    
    /**
     * @param object|null $component
     * @param string|callable $callback
     * @return array|string
     */
    private function getCallable($component, $callback)
    {
        if (null === $component) {
            return $callback;
        }
        
        return [$component, $callback];
    }
}
