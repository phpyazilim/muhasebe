<?php

namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use App\Models\Content;
use Illuminate\Support\Facades\App;


class TranslationServiceProvider extends ServiceProvider
{


   // protected  $locale = "";

   public function __construct() 
    {   
      /*   $localem = App::getLocale(); 
        dd(app()->getLocale()); */
    } 


    public function register()
    {
        // 
    }

    public function boot()
    {
        $this->locale = app()->getLocale();  
        $this->loadTranslations();
    }

    protected function loadTranslations()
    {
        $lang = app()->getLocale();  
      
         $locale = request()->segment(1);
         if (isValidLocale($locale) ) {
            $local = $locale;
 
         } else {
            $local = "tr";
         }
 
        $translations = Content::where('parent', 'translate')
                                ->where('lang',  $local)
                                ->pluck('url', 'baslik');

        config(['translate' => $translations]);
      

    }

}
