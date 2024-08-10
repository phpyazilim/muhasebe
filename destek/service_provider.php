Laravel Service Provider, Laravel framework'ünde bir bileşenin 
(örneğin, bir servis, middleware veya bir view bileşeni) Laravel 
uygulamasına nasıl entegre edileceğini belirten ve bu bileşenlerin 
kaynağını, bağlantılarını ve diğer ayarlarını tanımlayan sınıflardır.

Service Provider'lar, Laravel'in genişletilebilirliğini ve modülerliğini 
sağlayan önemli bir yapı taşıdır. Genellikle aşağıdaki işlemlerde 
kullanılırlar:

Servis Bağlama (Service Binding): Service Provider'lar, Laravel 
uygulamasına farklı servislerin nasıl bağlanacağını tanımlarlar.
 Bu, örneğin, bir veritabanı bağlantısı, bir e-posta servisi veya özel 
 bir hizmet olabilir.

Middleware Tanımlama: Middleware, gelen isteklerin işlenmesi sırasında 
araya giren kod parçalarıdır. Service Provider'lar, middleware'leri 
tanımlayarak ve bunları uygulamanın HTTP işleme döngüsüne bağlayarak 
Laravel uygulamasının işlevselliğini genişletebilirler.



View Bileşenleri Tanımlama: View bileşenleri, Laravel'in blade şablon 
motorunu kullanarak kullanıcı arayüzlerinin oluşturulmasını kolaylaştırır.
 Service Provider'lar, bu bileşenlerin tanımlanmasını ve kaynaklarının 
 belirlenmesini sağlarlar.
 

Servis Sağlayıcı Bağlamak (Provider Bootstrapping): Service Provider'lar, 
Laravel uygulamasının başlatılması sırasında belirli işlemleri 
gerçekleştirmek için kullanılabilirler. Bu, örneğin, servisleri başlatma, 
bileşenleri kaydetme veya uygulama yapılandırmasını yükleme gibi 
işlemleri içerebilir.



Service Provider'lar, Laravel'in geniş bir yelpazesinde kullanılabilir 
ve Laravel'in esnekliğini ve genişletilebilirliğini artırmak için güçlü 
bir araçtır.


*******************

Provider Bootstrapping özelliği kullanara sepet tablosunda 
2 saat öncesine ait kayıtları silmek için 

php artisan make:provider SepetTemizleProvider


Oluşturduğunuz Service Provider'ı düzenleyin 
(app/Providers/SepetTemizleProvider.php). boot metoduna sepet 
tablosundaki 2 saat öncesine ait kayıtları silme kodunu ekleyin.

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SepetTemizleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 2 saat öncesine ait kayıtları sil
        DB::table('sepet')->where('created_at', '<', Carbon::now()->subHours(2))->delete();
    }
}


Oluşturduğunuz Service Providerı config/app.php dosyasındaki providers dizisine ekleyin:

'providers' => [
    // Diğer Service Provider'lar
    App\Providers\SepetTemizleProvider::class,
],


Task Scheduler Ayarları:
Ardından, bu işlemi periyodik olarak yapmak için Laravel Task Schedulerı
 kullanabilirsiniz. app/Console/Kernel.php dosyasına gidin ve 
 schedule metodunu düzenleyin:
 
 protected function schedule(Schedule $schedule)
{
    $schedule->command('sepet-temizle')->hourly(); // Her saat başı çalışacak şekilde ayarla
}


Artisan Komutu Oluşturma:
Artisan komutunu tanımlamak için app/Console/Commands dizinine yeni 
bir dosya ekleyin ve bu komutla ilgili mantığı yazın. Örneğin:

// php artisan make:command SepetTemizleCommand 

Bu komut, sepet tablosundaki eski kayıtları silmek için kullanılabilir.
Task Schedulerı Ayarla:
Task Schedulerı kullanarak bu komutu periyodik olarak çağırabilirsiniz. 
Yukarıdaki örnekte olduğu gibi schedule metodunu kullanarak komutun 
nasıl çalıştırılacağını belirleyin.





-------------

Bu örnekte, AppServiceProvider adında bir servis sağlayıcısı tanımlıyoruz. boot metodunda, uygulamanın başlatılması sırasında çalışacak işlemleri gerçekleştiriyoruz. Örneğin, View::share yöntemiyle, tüm görünümlerde kullanılabilen siteName adında bir değişkeni tanımlıyoruz. Bu değişken, site adını temsil eder ve her görünümde erişilebilir hale gelir.

Bu servis sağlayıcısı, uygulamanın başlatılması sırasında otomatik olarak yüklenir ve belirtilen işlemleri gerçekleştirir. Bu sayede, uygulama başladığında belirli yapılandırmaların veya işlemlerin otomatik olarak yapılmasını sağlayabilirsiniz. Bu tür bir servis sağlayıcısı, genellikle uygulamanın temel yapılandırmasını ve başlatılmasını yönetmek için kullanılır.
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Örneğin, bir view içine genel bir değişken tanımlayalım
        View::share('siteName', 'My Awesome Site');
    }
}






