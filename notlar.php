php artisan serve  /// yeni bir projeyi başlatmadır
php artisan migrate  /// veritabanına taşımak için
 php artisan migrate:fresh  // veritabanı güncellemeleri update için
 php artisan db:seed    // seed eklemek için
php artisan make:middleware UserTypeMiddleware
php artisan make:controller SliderAuthController    // controller içinden admin klasoru onun içnde AuthController oluştur
php artisan make:request Admin/ProfileUpdateRequest
php artisan make:model Slider -s  // başındaki takısı s olacak
// php artisan make:model Slider -m  // migration ile birlikte oluştur

php artisan make:model Lang -m -s  // migration ve seeder ile oluştur



ssle zorlamak için env dosyasına 
APP_SSL=true  üstteki blok içine eklenir  


composer show - paketleri gösterir


php artisan route:list

  php artisan config:clear
  php artisan route:clear


 php artisan cache:clear
 php artisan view:clear

composer dump-autoload
php artisan optimize:clear


composer dump-autoload:  Bu komut, Composer tarafından oluşturulan autoload dosyalarını yeniden oluşturur. Composer, PHP bağımlılıklarını yönetmek için kullanılan bir araçtır. Projenizin kök dizininde bu komutu çalıştırdığınızda, Composer proje bağımlılıklarınızı yükler ve composer.json dosyasındaki sınıfları yükler. Bazen, yeni sınıflar eklediğinizde veya yapılandırma değişiklikleri yaptığınızda, autoload dosyalarını yeniden oluşturmak gerekebilir. Bu komut bu işlemi gerçekleştirir.
php artisan optimize:clear:  Bu komut, Laravel'in önbelleğini temizler. Laravel, uygulama performansını artırmak için belirli dosyaları önceden işler ve önbelleğe alır. optimize:clear komutu, bu önbelleği temizler ve Laravel'in yeniden yapılandırılmasını sağlar. Genellikle yapılandırma dosyalarını değiştirdiğinizde veya uygulama güncellemesi yaptığınızda kullanılır. Bu komut, önbelleğin temizlenmesi dışında, route, config, view, event, compiled, packages, cache, ve sessions gibi önbellekleme dosyalarını temizler. Bu dosyaların güncellenmesi gerektiğinde veya bir problem çözüldüğünde kullanışlıdır.



php artisan tinker
App\Models\Visitor::all();

 

env dosyasındaki keyi değiştirmek için 
php artisan key:generate



make:cast
  ⇂ make:channel
  ⇂ make:command
  ⇂ make:component
  ⇂ make:controller
  ⇂ make:event
  ⇂ make:exception
  ⇂ make:factory
  ⇂ make:job
  ⇂ make:listener
  ⇂ make:mail
  ⇂ make:middleware
  ⇂ make:migration
  ⇂ make:model
  ⇂ make:notification
  ⇂ make:observer
  ⇂ make:policy
  ⇂ make:provider
  ⇂ make:request
  ⇂ make:resource
  ⇂ make:rule
  ⇂ make:scope
  ⇂ make:seeder
  ⇂ make:test
  ⇂ make:view



  site config ayarları iç
  https://www.udemy.com/course/sifirdan-ileri-seviyeye-laravel-egitimi/learn/lecture/24947372#overview

