 Anladım, Laravel'de rotaya gelen isteğe göre bir oturum değeri ayarlamak istiyorsunuz. Bu durumda, Laravel'in rotalarında middleware kullanarak bu işlemi gerçekleştirebiliriz. Özel bir middleware oluşturup, bu middleware'i rotanıza ekleyebiliriz. Bu middleware, rotaya gelen isteğe göre oturum dilini belirleyecektir.

İşte adımlar:

Middleware Oluşturma: Öncelikle, özel bir middleware oluşturun. Bu middleware, rotaya gelen isteğe göre oturum dilini belirleyecek.

php artisan make:middleware SetLanguage


Middleware'i Düzenleme: Oluşturduğunuz middleware'i düzenleyin. Bu middleware, rotaya gelen isteğe göre oturum dilini belirleyecek şekilde kodlanmalıdır. Örneğin:

<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if ($request->routeIs('lang.*')) {
            $language = $request->segment(2); // Lang segment'inden dil alınıyor
            if (in_array($language, ['tr', 'en'])) {
                session(['language' => $language]); // Oturum dilini ayarla
            }
        }
        
        return $next($request);
    }
}

Middleware'i Rotalara Ekleyin: Oluşturduğunuz middleware'i rotalarınıza ekleyin.

Route::middleware('setLanguage')->group(function () {
    // Rotalarınız burada
});


Rota Tanımlama: Dilin belirleneceği rotayı tanımlayın. Bu rotaya gelen istekte oturum dilini belirleyeceğiz.

Route::get('/{language}/', function () {
    // Dil oturumunu ayarlayacak middleware, rotaya gelir gelmez çalışır.
});



Bu adımları izledikten sonra, /lang/{language} rotasına gelen her istekte, belirtilen dil oturumuna ayarlanacaktır. Örneğin, /lang/tr rotasına yapılan bir istekte, language oturum değişkeni "tr" değeriyle ayarlanacaktır.

Bu şekilde, rotalara gelmeden önce istekleri işleyen özel bir middleware oluşturarak, dil belirleme işlemini kontrol altına almış olursunuz.

 
