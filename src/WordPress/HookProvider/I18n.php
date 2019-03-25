<?php

namespace NunoCodex\Slumex\WordPress\HookProvider;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\WordPress\HookProviderInterface;
use NunoCodex\Slumex\WordPress\HookProviderTrait;

/**
 * Class I18n
 * @package NunoCodex\Slumex\WordPress\HookProvider
 */
class I18n implements HookProviderInterface, ContainerAwareInterface
{
    use HookProviderTrait, ContainerAwareTrait;
    
    /**
     *
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
