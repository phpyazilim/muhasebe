Laravel'de sayfa açılmadan önce belirli bir kodun çalışmasını istiyorsanız, 
bu kodu "middleware" olarak tanımlayabilirsiniz. Middleware'ler, gelen istekleri 
işlemek veya yanıtları değiştirmek için kullanılan ara katmanlardır. 
Sayfa açılmadan önce veya sonra çalışacak kodlarınızı middleware olarak 
tanımlayarak istediğiniz işlemleri gerçekleştirebilirsiniz.

Middleware'ler, Laravel'in app/Http/Middleware dizini altında bulunurlar. 
Önceden tanımlanmış middleware'leri düzenleyebilir veya yeni middleware'ler 
oluşturabilirsiniz. Örneğin, bir örnek middleware oluşturmak için şu Artisan 
komutunu kullanabilirsiniz:

php artisan make:middleware BeforePageLoadMiddleware


Bu komut, BeforePageLoadMiddleware.php adında yeni bir middleware sınıfı 
oluşturur. Ardından, bu middleware'i tanımlamak için BeforePageLoadMiddleware 
sınıfını düzenleyebilir ve istediğiniz kodu handle() metodunda ekleyebilirsiniz. 
Örneğin:


namespace App\Http\Middleware;

use Closure;

class BeforePageLoadMiddleware
{
    public function handle($request, Closure $next)
    {
        // Sayfa açılmadan önce yapılacak işlemleri buraya ekleyin

        return $next($request);
    }
}


Bu middleware'i belirli bir rotaya veya tüm rotalara uygulamak istiyorsanız, 
bu middleware'i App\Http\Kernel sınıfında tanımlayabilirsiniz. 
protected $middleware veya protected $middlewareGroups özelliklerinden birine 
ekleyebilirsiniz. Örneğin:


protected $middleware = [
    // Diğer middleware'ler...
    \App\Http\Middleware\BeforePageLoadMiddleware::class,
];


Bu sayede, middleware'iniz herhangi bir sayfa açılmadan önce çalışacaktır. 
İstediğiniz işlemleri bu middleware'in handle() metodu içinde 
gerçekleştirebilirsiniz.










