<?php

use Mews\Purifier\Facades\Purifier;

if (!function_exists('clean')) {
    function clean($value)
    {
        return Purifier::clean($value);
    }
}
