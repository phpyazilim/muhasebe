Yetkilendirme İçin Policy Oluşturma
İlk olarak, yetkilendirmeyi kontrol etmek için bir policy oluşturmanız gerekiyor. Örneğin, Post modeli üzerinde yetkilendirme yapmak istiyorsak:

php artisan make:policy PostPolicy --model=Post


Bu komut, App/Policies/PostPolicy.php dosyasını oluşturur. Bu dosya, update, delete gibi işlemleri kontrol edeceğiniz metotları içerecek.

2. Policy Metotları Tanımlama
Oluşturduğunuz PostPolicy içinde, kullanıcıların Post modeli üzerinde yapabileceği eylemleri tanımlayın. Örneğin:


class PostPolicy
{
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}



Yukarıdaki örnekte, update ve delete metotları, sadece post'u oluşturan kullanıcının
 (yani user_id ile ilişkilendirilen kullanıcının) postu güncelleyebilmesine ve silebilmesine izin verir.

3. Gate Tanımlama
Daha sonra, bu policy'leri Gate'ler aracılığıyla kullanarak belirli eylemleri yetkilendirebilirsiniz.
 AuthServiceProvider sınıfında boot metodu içinde tanımlayabilirsiniz:


use App\Models\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);
    }
}


Bu, update-post ve delete-post isimli gate'ler oluşturur ve bu gate'ler, ilgili policy metotlarını çağırarak 
yetkilendirme işlemlerini gerçekleştirir.

4. Kullanım
Son olarak, controller veya diğer yerlerde bu gate'leri kullanarak yetkilendirme yapabilirsiniz:


if (Gate::allows('update-post', $post)) {
    // Kullanıcı post'u güncelleyebilir
} else {
    // Yetkilendirme hatası
}

veya blade şablonlarında:

@can('delete-post', $post)
    <!-- Silme butonu veya içerik -->
@endcan



***********************************


1. Custom Gate Oluşturma
Öncelikle, genel yetkilendirme mantığını tanımlayacak bir Custom Gate oluşturun. Bu gate, tüm modeller için genel olarak 
geçerli olacak yetkilendirme kurallarını içerecek.

// AuthServiceProvider.php

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('crud-permission', function ($user, $ability, $model) {
            // Burada $ability, 'create', 'update' veya 'delete' olabilir
            // $model, yetkilendirme yapılacak model instance'ı olacaktır

            // Örnek bir yetkilendirme mantığı:
            if ($ability === 'create') {
                // Kullanıcı herhangi bir model için ekleme yetkisine sahipse true döndür
                return true;
            } elseif ($ability === 'update') {
                // Kullanıcı sadece kendi oluşturduğu modeli güncelleyebilir
                return $user->id === $model->user_id;
            } elseif ($ability === 'delete') {
                // Kullanıcı sadece kendi oluşturduğu modeli silebilir
                return $user->id === $model->user_id;
            }

            return false;
        });
    }
}


Yukarıdaki örnekte, crud-permission isimli Custom Gate, $user, $ability (create, update, delete gibi) ve $model parametrelerini
 alarak genel yetkilendirme mantığını uygular. Bu gate, herhangi bir model üzerinde çalışacak ve yetkilendirme için bu 
 mantığı kullanacaktır.

2. Middleware Oluşturma
Şimdi, bu Custom Gate'i kullanacak bir Middleware oluşturun. Middleware, istekleri işlem öncesinde kontrol eder ve
 isteğin yetkilendirme kurallarını sağlayıp sağlamadığını kontrol eder.

php artisan make:middleware AuthorizeCRUD

Sonra oluşturulan Middleware'i düzenleyin:

// app/Http/Middleware/AuthorizeCRUD.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class AuthorizeCRUD
{
    public function handle($request, Closure $next, $modelClass)
    {
        // $modelClass parametresinden model sınıfını çıkar
        $model = new $modelClass;

        // İstekle ilişkilendirilen yetkilendirme eylemini al
        $ability = $request->getMethod() === 'POST' ? 'create' : (
            $request->getMethod() === 'PUT' || $request->getMethod() === 'PATCH' ? 'update' : 'delete'
        );

        // Yetkilendirme kontrolleri
        if (Gate::denies('crud-permission', [$request->user(), $ability, $model])) {
            abort(403, 'Bu işlemi gerçekleştirmek için yetkiniz yok.');
        }

        return $next($request);
    }
}



3. Middleware'i Routelarla ve Controller'larda Kullanma
Middleware'i route gruplarında veya direkt olarak controller metodlarında kullanabilirsiniz. Örneğin:

// Route grupları içinde kullanım
Route::middleware('authorizeCRUD:App\Models\Post')->group(function () {
    // Post işlemleri route'ları buraya gelecek
});

// Controller metodunda kullanım
public function update(Request $request, Post $post)
{
    $this->authorize('crud-permission', [$request->user(), 'update', $post]);

    // Güncelleme işlemleri
}

4. Diğer Modeller İçin Kullanım
Bu yöntemi diğer modeller için de aynı şekilde uygulayabilirsiniz. Yani, herhangi bir model için yetkilendirme 
yapmak istediğinizde, ilgili route gruplarında veya controller metodlarında authorizeCRUD middleware'ini kullanarak 
yetkilendirme yapabilirsiniz.

Bu şekilde, tüm modelleriniz için genel bir yetkilendirme mantığı oluşturabilir ve kod tekrarını azaltabilirsiniz.
 Ayrıca, güvenliği artırarak yetkilendirme kurallarını tek bir yerden yönetebilirsiniz.






