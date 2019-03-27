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
     * @return mixed
     */
    public function get($id)
    {
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
