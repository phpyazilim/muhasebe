php artisan make:provider SiteProvider

boot kısmına kodlar yazılır 
config()->set('site',Site::pluck('value','item')->all());

daha sonra config/app.php içine App\Provider\SiteProvider::class  şeklinde tanımlanır 

daha sonra ayarlar şu şekilde çağrılır 
config('site.site_name');
blade içinde 
{{ config('site.site_name') }}

şeklinde kullanılır 

