<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\Container;
use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * Class Templater
 * @package NunoCodex\Slumex\ServiceProvider
 */
class Templater implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        $this->container['templater.path_patterns'] = '';
        
        $this->container['templater.filesystem_loader'] = function (Container $container) {
            return new FilesystemLoader($container->get('templater.path_patterns'));
        };
        
        $this->container['templater.template_name_parser'] = function () {
            return new TemplateNameParser();
        };
        
        $this->container['templater.php_engine'] = function (Container $container) {
            return new PhpEngine(
                $container->get('templater.template_name_parser'),
                $container->get('templater.filesystem_loader')
            );
        };
        
        $this->container['templater'] = function (Container $container) {
            return $container->get('templater.php_engine');
        };
    }
}
