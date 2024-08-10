Servis Bağlama (Service Binding) Kullanma (Opsiyonel): 
Büyük uygulamalarda veya kodunuzu daha iyi organize etmek istediğiniz durumlarda, Laravel'in servis bağlama 
özelliğini kullanarak bu diziyi uygulama boyunca erişilebilir hale getirebilirsiniz.
// AppServiceProvider içinde boot() fonksiyonu
public function boot()
{
    $this->app->bind('myArray', function () {
        return [1, 2, 3, 4, 5];
    });
}

// AppServiceProvider içinde boot() fonksiyonu
public function boot()
{
    $this->app->bind('myArray', function () {
        return [1, 2, 3, 4, 5];
    });
}


Artık bu diziyi herhangi bir yerde çağırabilirsiniz:

$myArray = app('myArray');



-------------

Servis Sağlama Dosyası Oluşturma:

php artisan make:provider ArrayProvider

Bu komut, ArrayProvider adında bir sağlayıcı sınıfı oluşturur. Ardından, ArrayProvider sınıfında diziyi tanımlayacağız.

Dizi Tanımlama:
Oluşturulan ArrayProvider sınıfında dizi değişkenimizi tanımlayacağız.
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArrayProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('myArray', function () {
            return [1, 2, 3, 4, 5];
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}


Şimdi bu servisi kullanarak diziyi controller'da ve blade şablonlarında çağırabiliriz.


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $myArray = app('myArray');
        return view('example', compact('myArray'));
    }
}

?>

Blade şablonunda kullanım:

@foreach($myArray as $item)
    <p>{{ $item }}</p>
@endforeach
