<?php

if (!function_exists('debug')) {
    /**
     * Debug extended function.
     */
    function debug()
    {
        if (!defined('DEBUG')) {
            return;
        }

        $num_args = func_num_args();
        $arg_list = func_get_args();

        $bt = debug_backtrace();

        if (isset($bt[1]['class'])) {
            $output = '[' . $bt[1]['class'] . '::' . $bt[1]['function'] . '] ';
        } else {
            $output = '[' . $bt[1]['function'] . '] ';
        }

        for ($i = 0; $i < $num_args; ++$i) {
            $arg = $arg_list[$i];

            if (is_string($arg)) {
                $arg_output = $arg;
            } else {
                $arg_output = var_export($arg, true);
            }

            if ($arg === '') {
                $arg_output = '""';
            } elseif ($arg === null) {
                $arg_output = 'null';
            }

            $output = $output . $arg_output . ' ';
        }

        //$output = substr($output, 0, -1);
        //$output = substr($output, 0, 1024); // Restrict messages to 1024 characters in length

        error_log('DEBUG: ' . $output);
    }
}
