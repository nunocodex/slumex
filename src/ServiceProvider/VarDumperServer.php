<?php

namespace NunoCodex\Slumex\ServiceProvider;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class VarDumperServer
 * @package NunoCodex\Slumex\ServiceProvider
 */
class VarDumperServer implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        if (!class_exists(VarCloner::class)) {
            return;
        }
    
        $container = $this->getContainer();
        
        $cloner = new VarCloner();
        
        $fallbackDumper = \in_array(\PHP_SAPI, array('cli', 'phpdbg')) ? new CliDumper() : new HtmlDumper();
        
        $dumper = new ServerDumper($container->get('var_dump_server.host', 'tcp://127.0.0.1:9912'), $fallbackDumper, [
            'cli' => new CliContextProvider(),
            'source' => new SourceContextProvider(),
        ]);
        
        VarDumper::setHandler(function ($var) use ($cloner, $dumper) {
            $dumper->dump($cloner->cloneVar($var));
        });
    }
}
