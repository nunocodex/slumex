<?php

namespace NunoCodex\Slumex\Container;

use NunoCodex\Slumex\WordPress\HookProviderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class Container
 * @package NunoCodex\Slumex\Container
 */
class Container extends ContainerBuilder implements ContainerInterface
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
            $this->setParameter($k, $v);
        }
        
        $provider->register();
    
        return $this;
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
