<?php

namespace NunoCodex\Slumex\Container;

use Pimple\Container as BaseContainer;

/**
 * Class Container
 * @package NunoCodex\Slumex\Container
 */
class Container extends BaseContainer implements ContainerInterface
{
    /**
     * @var Container|ContainerInterface
     */
    private static $instance;
    
    /**
     * @param string|null $id
     * @return mixed|Container
     */
    public static function create(string $id = null)
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        
        if (null !== $id and self::$instance->has($id)) {
            return self::$instance->get($id);
        }
        
        return self::$instance;
    }
    
    /**
     * @param ServiceProviderInterface $provider
     * @param array $values
     * @return ContainerInterface|$this
     */
    public function register($provider, array $values = [])
    {
        if ($provider instanceof ContainerAwareInterface) {
            $provider->setContainer($this);
        }
    
        $provider->register();
    
        // We not use the parent function
        foreach ($values as $k => $v) {
            $this[$k] = $v;
        }
    
        if ($provider instanceof BootableProviderInterface) {
            $provider->boot();
        }
    
        return $this;
    }
    
    /**
     * @param string $id
     * @param null|mixed $default
     * @return mixed
     */
    public function get($id, $default = null)
    {
        if (!$this->has($id)) {
            return $default;
        }
        
        return $this->offsetGet($id);
    }
    
    /**
     * @param string $id
     * @return bool
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
}
