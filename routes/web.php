<?php


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Helpers\StringHelper;


/* Route::fallback(function () {
    return view('errors.404');
});
 */


 Route::get('/cerez-kabul', [FrontendController::class, 'cerez'])->name('front.cerezkabul');
 


Route::get('/aaa', [FrontendController::class, 'iletisim'])->name('contact.asd');



Route::post('/contact-send', [SendMailController::class, 'iletisimsend'])->name('contact.send');

 Route::get('/', [FrontendController::class, 'index'])->name('home');

 Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
 Route::get('/user/forgot-password', [AuthController::class, 'forgotPassword'])->name('user.forgotPassword');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->namphp are('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 */

 
Route::group([
    'middleware' =>['auth' , 'user.type:user' ] ,
    'prefix' =>'user' ,
    'as' => 'user.'


    ] , function(){
 

   Route::get('/dashboard' , [UserProfileController::class , 'dashboard'] )->name('user.dashboard');
   Route::put('/profile' , [UserProfileController::class , 'update'] )->name('profile.update');
   Route::put('/profile-password' , [UserProfileController::class , 'passwordUpdate'] )->name('profile.password.update');


});



Route::group([
    'prefix' => '{locale}', 
    'middleware' => 'locale'
], function () {
     
  
    if (App::isLocale('ru')) {
       // echo "llllllllll"; die();
     }  

   //   dd(app()->getLocale());
  
   //  $locale = app()->getLocale();
   //   dd($locale );
   // $routes = require base_path('lang/' . app()->getLocale() . '/routes.php');
     
     $routesFilePath = resource_path('lang/tr/routes.php');
     $routes = require $routesFilePath;
 
 
    Route::get('iletisim', [FrontendController::class, 'iletisim'])->name( "{locale}.front.iletisim" );
   
 
 

});



/*

Route::middleware(['web'])->group(function () {
    Route::get('/{locale}/anasayfa', [FrontendController::class, 'anasayfa'])->name('{locale}.front.anasayfa');
    Route::get('/{locale}/kurumsal', [FrontendController::class, 'kurumsal'])->name('{locale}.front.kurumsal');
    Route::get('/{locale}/iletisim', [FrontendController::class, 'iletisim'])->name('{locale}.front.iletisim');
    Route::get('/{locale}/urunler', [FrontendController::class, 'urunler'])->name('{locale}.front.urunler');
});

 
 
Route::get('/iletisim', [FrontendController::class, 'iletisim'])->name('front.iletisim');
Route::get('/contact', [FrontendController::class, 'iletisim'])->name('front.contact');

 */


 // Route::get('/{locale}/anasayfa', [FrontendController::class, 'anasayfa'])->name('front.anasayfa');


  Route::group(['prefix' => '{locale}'], function () {
 
    $locale = request()->segment(1);

    if (isValidLocale($locale) ) {
      $local = $locale;
      $routes = require resource_path("lang/{$local}/routes.php");
  
      Route::get($routes['anasayfa'], [FrontendController::class, 'anasayfa'])->name('front.anasayfa');
      Route::get($routes['kurumsal'], [FrontendController::class, 'kurumsal'])->name('front.kurumsal');
      Route::get($routes['iletisim'], [FrontendController::class, 'iletisim'])->name('front.iletisim');
    // Route::get($routes['urunler'] . '/{slug}', [FrontendController::class, 'urunler'])->name('front.urunler');

  } 

 



 });


  
  

Route::get('/password', function () {
    $veri = Hash::make("123456");
    return $veri;
});
  

Route::get('/dizin', function () {
    return $_SERVER['DOCUMENT_ROOT'];
});



Route::get('/phpinfo',function (){ echo phpinfo();});


require __DIR__.'/auth.php';

 