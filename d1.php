 {{\Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y')}}
		  
		  

---------------------

kullanıcı bilgileri bu şekilde json olarak geliyor
{{Auth()->user()}}

-------------

+++   php artisan make:controller yonetici/YoneticiGirisKontroller

Kontrollerin üst tarafına bu kod eklenmelidir , yoksa view çalışmaz
use Illuminate\View\View;


 class YoneticiGirisKontroller extends Controller
{
    function login() :View{
        return view('yonetici.auth.login'); // yonetici.auth.login routerde tanımlanan anahtar
    }
}



+++  router ekleniir
Route::get('yonetici/giris', [YoneticiGirisKontroller::class,'login'])->name('yonetici.giris');
Name routeyi başka yerden çağırmak içn kullanılır


+++++ middleware eklenir  - UserTypeMiddleware
middleware oluşturulur içindeki fonksiyonun çalışabilmesi içn Kernel.php de tanımlanması gerekir ,

Middleware routed şu şekilde de tanımlanır
Route::get('yonetici/giris', [YoneticiGirisKontroller::class,'login'])->name('yonetici.giris');

------


   'user.type' => \App\Http\Middleware\UserTypeMiddleware::class, // kernel dosyası

// daha sonra hangi rootun kontrol edileceğil rootta belirtilir

public function handle(Request $request, Closure $next , string $user_type): Response
    {
      // dd($request->user()->user_type  );
        //return $next($request);
        if ($request->user()->user_type === $user_type ) {
            return $next($request);
        }
        return redirect()->route('dashboard');
    }


Root içinde -- user.type:admin olarak gönderilir ,
Route::group([
     'middleware' =>['auth' , 'user.type:admin' ] ,  // kullanıcı giriş yapmadan  'user.type:admin' tanımsız geliyor
     'prefix' =>'admin' ,
     'as' => 'admin.'

     ] , function(){

        /// dashboard start
    Route::get('/dashboard' , [DashboardController::class , 'index'] )
    ->name('dashboard.index');
    /// dashboard end

});


***** providers yönlendirmeler // admin giriş yaptıktan sonra panel yönlendirme içn
RouteServiceProvider içine ekledik
  public const ADMIN = '/admin/dashboard';

Daha sonra controller / auth içndeki AuthenticatedSessionController sayfasına 30. Satıra

 if(Auth()->user()->user_type === "admin"){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
Bu kontrolu ekledik ,


------------------------------------------------
**** routegruplama ,
// Route::group([], function() {}); grup kısaca bu şekilde
Route::group([
     'middleware' =>['auth' , 'user.type:admin' ] , // burda tanımlı 2 tane middleware olduğunu gösteriyor
     'prefix' =>'admin' , // bu route admin içnde olduğu içn tüm urllerde admin bulunmaktadır.
     'as' => 'admin.' // name içinde bulunan admin önekini burdan alır

     ] , function(){

        /// dashboard start
    Route::get('/dashboard' , [DashboardController::class , 'index'] )
    ->name('dashboard.index');
    /// dashboard end

});



Yeni root dosyası oluşturunca aşağıdaki satırı ve ilgili controlrolleri eklemek gerekir ,,
use Illuminate\Support\Facades\Route;
Sonra provider/RouteServiceProvider içinde aşağıdaki gibi tanımlamak gerekir

      Route::middleware('web') // web işlemleri için kullanıldığı anlamına gelir
                ->group(base_path('routes/admin.php'));




------------------
<link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}"  />
asset public klasörünün içini getir demek


-------------------

@yield('content')  // ana template dosyasında  content adında bir alan tut
daha sonnra ilgili dosyada ,,
@section('content')
ilgili değişecek olan include buraya yazılır
@endsection


https://www.udemy.com/course/sfrdan-laravel-10-ile-b2b-eticaret-sistemi/learn/lecture/42107648#announcements
4:40
