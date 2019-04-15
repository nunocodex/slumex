<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Class Theme
 * @package NunoCodex\Slumex\WordPress
 */
class Theme extends Addon
{
    /**
     * Plugin constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        if (!isset($values['theme.filename']) or !$values['theme.filename']) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
            $values['theme.filename'] = $backtrace[0]['file'];
        }
        
        if (!isset($values['theme.slug']) or !$values['theme.slug']) {
            $values['theme.slug'] = basename(dirname($values['theme.filename']));
        }
        
        parent::__construct($values);
    }
}
