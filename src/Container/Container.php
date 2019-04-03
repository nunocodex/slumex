<?php

namespace NunoCodex\Slumex\Container;

use Illuminate\Container\Container as BaseContainer;

/**
 * Class Container
 * @package NunoCodex\Slumex\Container
 */
class Container extends BaseContainer implements ContainerInterface
{
    /**
     * Container constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
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
    
        foreach ($values as $k => $v) {
            $this->offsetSet($k, $v);
        }
    
        $provider->register();
    
        return $this;
    }
    
    /**
     * @param string $id
     * @param null|mixed $default
     * @return mixed
     */
    public function get($id, $default = null)
    {
        if (!parent::has($id)) {
            return $default;
        }
        
        return parent::get($id);
    }
}
