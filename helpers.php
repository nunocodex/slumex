<?php

if (!function_exists('debug')) {
    /**
     * Debug extended
     *
     * @param mixed ...$vars
     */
    function debug(...$vars)
    {
        if (!defined('DEBUG')) {
            return;
        }

        $bt = debug_backtrace();

        if (isset($bt[1]['class'])) {
            $output = '[' . $bt[1]['class'] . '::' . $bt[1]['function'] . '] ';
        } else {
            $output = '[' . $bt[1]['function'] . '] ';
        }

        foreach ($vars as $var) {
            if (is_string($var)) {
                $arg_output = $var;
            } else {
                $arg_output = "\n" . var_export($var, true) . "\n";
            }

            if ($var === '') {
                $arg_output = '""';
            } elseif ($var === null) {
                $arg_output = 'null';
            }
    
            error_log('DEBUG: ' . $output . " " . $arg_output);
        }

        //$output = substr($output, 0, -1);
        //$output = substr($output, 0, 1024); // Restrict messages to 1024 characters in length

        //error_log('DEBUG: ' . $output);
    }
}
