<?php

namespace NunoCodex\Slumex\WordPress\HookProvider\Theme;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;
use NunoCodex\Slumex\WordPress\HookAwareInterface;
use NunoCodex\Slumex\WordPress\HookProviderTrait;

/**
 * Class I18n
 * @package NunoCodex\Slumex\WordPress\HookProvider\Theme
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
     * Load the text domain to localize the theme.
     */
    public function loadTextdomain()
    {
        $c = $this->getContainer();

        $theme_rel_path = $c->get('directory') . '/languages';
        load_theme_textdomain($c->get('slug'), $theme_rel_path);
    }
}
