<?php

if (!function_exists('generateReference')) {
    function generateReference($lengthOfString = 15): string
    {
        $strResult = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        return substr(str_shuffle($strResult), 0, $lengthOfString);
    }
}
