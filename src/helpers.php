<?php

if (!function_exists('convert_array_to_key_value_header_format')) {
    
    function convert_array_to_key_value_header_format($array)
    {
        foreach ($array as $key => $values) {
            foreach ($values as $value) {
                $headers[] = "$key: $value";
            }
        }

        $header_string = implode("\r\n", $headers);

        return $header_string;
    }
}

if (!function_exists('set_http_logger_batch')) {
    
    function set_http_logger_batch($string)
    {
        $GLOBALS['http_logger_batch'] = $string;
    }
}

if (!function_exists('get_http_logger_batch')) {
    
    function get_http_logger_batch()
    {
        return $GLOBALS['http_logger_batch'] ?? null;
    }
}