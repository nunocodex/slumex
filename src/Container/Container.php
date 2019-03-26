<?php

namespace NunoCodex\Slumex\Container;

use NunoCodex\Slumex\WordPress\HookProviderInterface;
use Pimple\Container as PimpleContainer;

/**
 * Class Container
 * @package NunoCodex\Slumex\Container
 */
class Container extends PimpleContainer implements ContainerInterface
{
    /**
     * @param ServiceProviderInterface|HookProviderInterface $provider
     * @param array $values
     * @return ContainerInterface|$this
     */
    protected function registerProvider($provider, array $values = [])
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

    /**
     * @param ServiceProviderInterface $provider
     * @param array $values
     * @return ContainerInterface|$this
     */
    public function registerService(ServiceProviderInterface $provider, array $values = [])
    {
        return $this->registerProvider($provider, $values);
    }
}
