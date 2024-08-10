aravel'de loglama işlemleri genellikle Log facade'i üzerinden gerçekleştirilir. 
Log facadesinin çeşitli metotları 
(emergency, alert, critical, error, warning, notice, info, debug) 
ile belirli log seviyelerinde mesajlar kaydedilir.



Log::error('Hata oluştu: ' . $e->getMessage());


// Kullanıcı oturum açma işlemi
$user = Auth::user();
Log::info('Kullanıcı oturum açtı: ' . $user->name);



// Kullanıcı bilgilerini debug amaçlı loglama
Log::debug('Kullanıcı bilgileri: ', $user->toArray());



// Önemli bir servisin erişilemez olduğunu belirten bir uyarı loglama
Log::warning('Önemli servis erişilemez durumda: API sunucusu yanıt vermiyor.');


// Yeni bir kullanıcı kaydedildiğini bildiren bir notice loglama
Log::notice('Yeni kullanıcı kaydedildi: ' . $user->name);


// Uygulamanın başladığını bildiren bir info loglama
Log::info('Uygulama başladı.');


// İşlem sırasında değişkenlerin değerlerini debug amaçlı loglama
$data = ['username' => $user->username, 'email' => $user->email];
Log::debug('Kullanıcı bilgileri debug amaçlı: ', $data);




Örneğin, daily log kanalı için günlük dosyası ismi belirlemek istiyorsanız 
config/logging.php dosyasında şöyle bir yapılandırma yapabilirsiniz:

 

'channels' => [
    'daily' => [
        'driver' => 'daily',
        'path' => storage_path('logs/laravel.log'), // Burada dosya ismi belirtiliyor
        'level' => 'debug',
        'days' => 14,
    ],
],


Yukarıdaki örnekte path özelliği ile logların yazılacağı dosyanın tam yolu belirtilmiştir
 (storage_path('logs/laravel.log')). Bu dosya adı ve yolunu ihtiyacınıza göre özelleştirebilirsiniz.

Ayrıca, Log::channel metodu ile belirli bir kanalı seçebilir ve o kanala özgü işlemler yapabilirsiniz:



use Illuminate\Support\Facades\Log;

Log::channel('daily')->info('Bu bir info mesajıdır.');



Bu örnekte daily kanalına ait bir info seviyesinde bir log mesajı kaydedilmektedir.

Bu şekilde, Laravel'de log dosya ismi ve diğer yapılandırmaları özelleştirerek, uygulamanızın loglama işlemlerini ihtiyacınıza göre yönetebilirsiniz.


----------------------------------------------------
// storage/logs/laravel.log
use Illuminate\Support\Facades\Log;

Log::channel('single')->info('Bu bir info mesajıdır single log kanalı için.');
Log::channel('daily')->error('Bu bir error mesajıdır daily log kanalı için.');
Log::channel('slack')->critical('Bu bir critical mesajdır slack log kanalı için.');
Log::channel('syslog')->warning('Bu bir warning mesajıdır syslog log kanalı için.');
Log::channel('errorlog')->info('Bu bir info mesajıdır errorlog log kanalı için.');


Log::channel('daily')->error('Bu bir error mesajıdır daily log kanalı için.');

Log::emergency('Sistem çöktü! Sunucuya müdahale gerekiyor.');
Log::alert('Uygulamanın ana servisi erişilemez durumda!');
Log::critical('Kritik bir hata oluştu! Veritabanı bağlantısı başarısız.');
Log::error('Dosya kaydedilirken hata oluştu: Dosya yazma izinleri eksik.');
Log::warning('Depolama alanı dolmak üzere! Hemen temizlik yapılmalı.');
Log::notice('Yeni kullanıcı kaydedildi: John Doe');
Log::info('Kullanıcı giriş yaptı: user@example.com');
Log::debug('API isteği gönderildi: GET /api/users');






