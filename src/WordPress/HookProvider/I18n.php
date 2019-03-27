<?php

namespace NunoCodex\Slumex\WordPress\HookProvider;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use NunoCodex\Slumex\WordPress\HookAwareInterface;
use NunoCodex\Slumex\WordPress\HookProviderTrait;

/**
 * Class I18n
 * @package NunoCodex\Slumex\WordPress\HookProvider
 */
class I18n implements HookAwareInterface, ContainerAwareInterface, ServiceProviderInterface
{
    use HookProviderTrait, ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        if (did_action('plugins_loaded')) {
            $this->loadTextdomain();
        } else {
            $this->addAction('plugins_loaded', 'load_textdomain');
        }
    }
    
    /**
     * Load the text domain to localize the plugin.
     */
    protected function loadTextdomain()
    {
        $plugin_rel_path = dirname($this->getContainer()->get('plugin.basename')) . '/languages';
        load_plugin_textdomain($this->getContainer()->get('plugin.slug'), false, $plugin_rel_path);
    }
}
