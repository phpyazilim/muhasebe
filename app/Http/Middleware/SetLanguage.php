<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Log;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
 
  
         $locale = trim($request->segment(1));  
     
 
        if (isValidLocale($locale)) {
            $local = $locale;
        } else {
            $local = "tr";
        }
 
                 App::setLocale($local);
                 Log::info('Current locale: ' . $local);
           return $next($request);

     
    }
}

 