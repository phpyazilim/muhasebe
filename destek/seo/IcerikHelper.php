<?php

use App\Models\Kelime;
use App\Models\Sehir;


if (!function_exists('kelimeler')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function kelimeler( )
    {

        return Kelime::all();
    }
}


if (!function_exists('sehirler')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function sehirler( )
    {

        return Sehir::all();
    }
}



if (!function_exists('getKelime')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getKelime($url)
    {

        return  Kelime::where('url', $url)->first();

    }
}


if (!function_exists('getSehir')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getSehir($url )
    {

        return  Sehir::where('url', $url)->first();
    }
}



















?>
