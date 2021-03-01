<?php
namespace App\Helpers;

class RegularExpressionHelper
{
    public static function matchedId($string) {
        return ( preg_match('/\/title\/(\S*)\//', $string, $matches) ) ? $matches[1] : false; 
    }
}