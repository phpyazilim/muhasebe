// php artisan make:command komutaadi 
php artisan make:command  UserControl 
// aktivasyonu olmayan kullanıcıları sil 
// komut App/Console/UserControl.php dosyasında çalışır 
// php artisan yazınca komut geliyor 
// UserControl.php sayfasında 14. satırda 
app
  app:user-control        Command description


  komutlar   public function handle() kısmına yazılır 
  daha sonra kernel içine bu şekilde tanımlanır 
  $schedule->command('app:user-control')->everyMinute();


  php artisan schedule:run 


  url kısmından da komut çalştırılabilir 
  route tanımlanır 

  
