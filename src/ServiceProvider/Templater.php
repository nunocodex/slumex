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
        $container = $this->getContainer();
        
        //$container['templater.path_patterns'] = '';
        
        $container['templater.filesystem_loader'] = function (Container $c) {
            return new FilesystemLoader($c->get('templater.path_patterns', []));
        };
        
        $container['templater.template_name_parser'] = function (Container $c) {
            return new TemplateNameParser();
        };
        
        $container['templater.php_engine'] = function (Container $c) {
            return new PhpEngine($c->get('templater.template_name_parser'), $c->get('templater.filesystem_loader'));
        };
        
        $container['templater'] = function (Container $c) {
            return $c->get('templater.php_engine');
        };
    }
}
