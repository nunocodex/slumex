<?php

namespace NunoCodex\Slumex\WordPress;

/**
 * Class Theme
 * @package NunoCodex\Slumex\WordPress
 */
class Theme extends Addon
{
    /**
     * Theme constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        parent::__construct($filename);
        
        $this['directory'] = get_stylesheet_directory();
        
        $this['url'] = get_stylesheet_directory_uri();
    }
}
