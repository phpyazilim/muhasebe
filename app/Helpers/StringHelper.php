<?php

use App\Models\Menu;
use App\Models\Content;
  
if (!function_exists('removeTurkishCharacters')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */
    function removeTurkishCharacters($text)
    {
        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü');
        $replace = array('C', 'c', 'G', 'g', 'i', 'I', 'O', 'o', 'S', 's', 'U', 'u');
        return str_replace($search, $replace, $text);
    }
}


if (!function_exists('makeUrl')) {
    /**
     *
     * @param string $text
     * @return string
     */
    function makeUrl($text)
    {
        $text = removeTurkishCharacters($text);
        $text = preg_replace('/[^a-zA-Z]/', '', $text); // Sadece harfleri alır
        $text = preg_replace('/\s+/', '-', $text); // Boşlukları kaldırır ve tireye dönüştürür
        $text = strtolower($text);
        return $text;

    }
}



if (!function_exists('yetki_tanim')) {
    /**
     *
     * @param string $text
     * @return string
     */

function yetki_tanim() {
    $yetkiler = array(
        "tasarimayar"     => "Tasarım Ayarları", 
        "ayarlar"         => "Ayarlar", 
        "diller"          => "Diller", 
        "translate"       => "Translate",  
        "menu"            => "Menüler",  
        "iceriksayfalar"  => "İçerik Sayfaları",  
        "slider"          => "Slider",  
        "markalar"        => "Markalar",  
        "urunler"         => "Ürünler",     
        "yetkiler"        => "yetkiler",
        "kategoriler"     => "Kategoriler",
        "kullanicilar"    => "Kullanıcılar",


        "sistemkullanicilari"    => "Sistem Kullanıcıları",
         
    );

    return $yetkiler;
}

}

 


if (!function_exists('localized_route')) {
    function localized_route($name, $parameters = [])
    {
        $locale = app()->getLocale();
        $routes = require resource_path("lang/{$locale}/routes.php");
        $route = $routes[$name];

        foreach ($parameters as $key => $value) {
            $route = str_replace('{' . $key . '}', $value, $route);
        }

        return url($locale . '/' . $route);
    }
}




  if (!function_exists('isValidLocale')) {

function isValidLocale($locale) {
    $validLocales = ['tr', 'en', 'ru'];
    return in_array($locale, $validLocales);
}

} 





  if (!function_exists('getFolderFiles')) {

     function getFolderFiles($folder) {
        $files = File::allFiles(base_path($folder));
      return  $files;
    }


} 



 

?>
