<?php

namespace NunoCodex\Slumex\WordPress\HookProvider\Plugin;


use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use NunoCodex\Slumex\WordPress\HookAwareInterface;
use NunoCodex\Slumex\WordPress\HookProviderTrait;

/**
 * Class I18n
 * @package NunoCodex\Slumex\WordPress\HookProvider\Plugin
 */
class I18n implements ServiceProviderInterface, HookAwareInterface, ContainerAwareInterface
{
    use HookProviderTrait, ContainerAwareTrait;

    /**
     * Register Service Provider
     */
    public function register()
    {
        if (!did_action('init')) {
            $this
                ->addAction('init', $this, 'loadTextDomain')
            ;
        }
    }

    /**
     * Load the text domain to localize the plugin.
     */
    public function loadTextdomain()
    {
        $c = $this->getContainer();

        $plugin_rel_path = dirname($c->get('plugin.basename')) . '/languages/';
        load_plugin_textdomain($c->get('plugin.slug'), false, $plugin_rel_path);
    }
}
