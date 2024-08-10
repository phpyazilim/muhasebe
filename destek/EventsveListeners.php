Events ve Listeners Kullanımı
1. Event Oluşturma
Events, genellikle app/Events dizininde tanımlanır. Laravel, make:event Artisan komutunu kullanarak yeni bir event oluşturmanıza olanak tanır.

Örneğin, OrderShipped isimli bir event oluşturalım:

php artisan make:event OrderShipped

Bu komut, app/Events/OrderShipped.php dosyasını oluşturur. Event sınıfı genellikle Illuminate\Foundation\Events\Event sınıfından türetilir.

// app/Events/OrderShipped.php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderShipped
{
    use Dispatchable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}


2. Listener Oluşturma
Listeners, genellikle app/Listeners dizininde tanımlanır. make:listener Artisan komutu ile yeni bir listener oluşturulabilir.

Örneğin, SendShipmentNotification isimli bir listener oluşturalım:


    php artisan make:listener SendShipmentNotification --event=OrderShipped

    
    Bu komut, app/Listeners/SendShipmentNotification.php dosyasını oluşturur. Listener sınıfı, Illuminate\Contracts\Queue\ShouldQueue arayüzünü uygulayabilir ve eğer kullanılacaksa Queueable trait'ini kullanabilir.


    // app/Listeners/SendShipmentNotification.php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentNotification implements ShouldQueue
{
    public function handle(OrderShipped $event)
    {
        // Burada olayı işleyen kodu yazabiliriz
        $order = $event->order;
        // Bildirim gönderme işlemi veya başka işlemler yapılabilir
    }
}



3. Event ve Listener'ı Bağlama
Event'i ve listener'ı ilişkilendirerek Laravel'e bildirmek için, genellikle EventServiceProvider içinde listen özelliğini kullanırız.


// app/Providers/EventServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\OrderShipped;
use App\Listeners\SendShipmentNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderShipped::class => [
            SendShipmentNotification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}

Yukarıdaki örnekte, OrderShipped event'i SendShipmentNotification listener'ı ile ilişkilendirilmiştir. Bu sayede OrderShipped event'i tetiklendiğinde SendShipmentNotification listener'ı otomatik olarak çalışacaktır.

4. Event Tetikleme
Event'leri uygulama içinde tetiklemek için event global yardımcı fonksiyonunu kullanabiliriz.

// Controller veya başka bir yerde

use App\Events\OrderShipped;

public function shipOrder()
{
    // Order işlemleri burada yapılır...

    $order = // Order nesnesi oluşturulur veya alınır...

    // OrderShipped event'i tetiklenir
    event(new OrderShipped($order));
}

Yukarıdaki örnekte, OrderShipped event'i tetiklenerek ilgili listener'lar (örneğin SendShipmentNotification) otomatik olarak çalışacaktır.

Özet
Events ve listeners, Laravel uygulamanızda olay tabanlı işlemler yapmanıza olanak 
tanır. Bu yapının kullanımı sayesinde uygulamanızdaki işlemleri modüler hale getirebilir ve kodunuzun daha temiz ve yönetilebilir olmasını sağlayabilirsiniz. Events ve listeners, özellikle asenkron işlemler veya işlemlerin 





