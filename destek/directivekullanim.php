1. Directive Oluşturma ve Kullanma
Blade direktifleri oluşturmak için Blade komut dosyasınızda veya herhangi bir Blade hizmet sağlayıcısında 
Blade::directive metodunu kullanabiliriz.

Örneğin, bir @uppercase direktifi oluşturup kullanalım:


  // app/Providers/AppServiceProvider.php içinde

use Illuminate\Support\Facades\Blade;

public function boot()
{
    Blade::directive('uppercase', function ($expression) {
        return "<?php echo strtoupper($expression); ?>";
    });
}


Yukarıdaki kodda, @uppercase direktifini oluşturduk. Bu direktif, Blade şablonunda kullanıldığında, {{ @uppercase($variable) }} şeklindeki ifadeleri PHP tarafında strtoupper() işlemiyle büyük harfe dönüştürecektir.

Directive Kullanma:
Şimdi, Blade şablonlarında bu direktifi kullanabiliriz:

    {{-- resources/views/example.blade.php --}}

<div>
    Name in uppercase: @uppercase($name)
</div>

Yukarıdaki kullanım, $name değişkenini büyük harfe dönüştürecek ve görüntüleyecektir.

2. Directive Provider Tanımlama ve Kullanma
Blade direktiflerini kullanılabilir hale getirmek için bir directive service provider oluşturabiliriz.

Directive Service Provider Oluşturma:

php artisan make:provider BladeDirectiveServiceProvider

Bu komut, BladeDirectiveServiceProvider adında yeni bir hizmet sağlayıcısı oluşturur. Bu sağlayıcı, direktifleri kaydetmek ve uygulamanın başlatılması sırasında Blade'e kaydetmek için kullanılır.

Directive'leri Kaydetme:


// app/Providers/BladeDirectiveServiceProvider.php içinde

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

public function boot()
{
    // Example 1: Uppercase directive
        Blade::directive('uppercase', function ($expression) {
            return "<?php echo strtoupper($expression); ?>";
        });

        // Example 2: Custom date formatting directive
        Blade::directive('formatDate', function ($expression) {
            return "<?php echo (new \DateTime($expression))->format('Y-m-d'); ?>";
        });

        // Example 3: Conditional directive
        Blade::directive('role', function ($expression) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$expression})): ?>";
        });

        Blade::directive('endrole', function ($expression) {
            return '<?php endif; ?>';
        });

        // Add more directives as needed...
}

public function register()
{
    // 
}


boot metodunda Blade direktiflerini tanımlayabiliriz.

Directive Service Provider'ı Kaydetme:
BladeDirectiveServiceProvider'ı config/app.php içindeki providers dizisine ekleyin:


// config/app.php içinde

'providers' => [
    // Diğer sağlayıcılar
    App\Providers\BladeDirectiveServiceProvider::class,
],

Kullanma:
Artık uygulamanızın herhangi bir Blade şablonunda @uppercase direktifini kullanabilirsiniz:

    {{-- resources/views/example.blade.php --}}

    {{-- Example of usage in Blade template --}}

<div>
    Name in uppercase: @uppercase($name)
</div>

<div>
    Today's date: @formatDate(now())
</div>

@role('admin')
    <p>This is visible to users with the role 'admin'.</p>
@endrole

@role('editor')
    <p>This is visible to users with the role 'editor'.</p>
@endrole


Bu şekilde, Laravel'de Blade direktifleri oluşturabilir, 
uygulamanıza entegre edebilir ve tekrar eden işlemleri kolayca yönetebilirsiniz.
 Direktifler, Blade'in gücünü artırarak şablonlarınızı daha etkili ve okunabilir 
 hale getirmenize yardımcı olabilir.



