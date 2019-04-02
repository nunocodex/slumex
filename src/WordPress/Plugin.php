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
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        if (!isset($values['plugin.filename']) or !$values['plugin.filename']) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
            $values['plugin.filename'] = $backtrace[0]['file'];
        }

        if (!isset($values['plugin.slug']) or !$values['plugin.slug']) {
            $values['plugin.slug'] = basename(dirname($values['plugin.filename']));
        }

        $values = array_merge([
            'plugin.basename' => plugin_basename($values['plugin.filename']),
            'plugin.directory' => plugin_dir_path($values['plugin.filename']),
            'plugin.url' => plugin_dir_url($values['plugin.filename'])
        ], $values);

        parent::__construct($values);
    }
}
