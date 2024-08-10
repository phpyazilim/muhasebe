<?php

namespace App\Providers;
use App\Models\Ayarlar;
use App\Models\Content;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Auth;

class SiteAyarProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Request $request): void
    {
           
      config()->set('site', Ayarlar::pluck('name','value' )->all()); 
 
        /*      $locale = trim($request->segment(1));

           if (in_array($locale, ['tr', 'en', 'ru' ])) {
               $lang = $locale;    
             } else {
               $lang = "tr"; 
             } 
              
        $ceviriIcerikleri = getCeviriler($lang)->pluck('baslik', 'url')->all();
        config()->set('ceviri', $ceviriIcerikleri); */

          

/*       

     {{ config('ceviri.iletisim')  }}
       {{ __('routes.iletisim') }}  dosyadan çekmek için 

*/


    }
}
