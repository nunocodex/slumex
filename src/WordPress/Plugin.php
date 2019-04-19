<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Class Plugin
 * @package NunoCodex\Slumex\WordPress
 */
class Plugin extends Addon
{
    /**
     * Plugin constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        parent::__construct($filename);

        $this['basename'] = plugin_basename($filename);
        $this['directory'] = plugin_dir_path($filename);
        $this['url'] = plugin_dir_url($filename);
    }
}
