<?php


use App\Http\Controllers\Frontend\FrontendController;  
use App\Http\Controllers\SendMailController;  
use Illuminate\Support\Facades\Route;


Route::post('/contact-send', [SendMailController::class, 'iletisimsend'])->name('contact.send');

Route::fallback(function () {
    return view('errors.404');
});

 Route::get('/', [FrontendController::class, 'index'])->name('front.home'); 
 Route::get('/iletisim', [FrontendController::class, 'iletisim'])->name('front.iletisim');
 Route::get('/kurumsal/{id}', [FrontendController::class, 'icerik'])->name('front.icerik');
 Route::get('/sayfa/{id}', [FrontendController::class, 'sayfa'])->name('front.sayfa');
 Route::get('/bizden-haberler', [FrontendController::class, 'haberler'])->name('front.haber');
 Route::get('/haber-detay/{id}', [FrontendController::class, 'haberdetay'])->name('front.haberdetay');
 Route::get('/kategori', [FrontendController::class, 'kategori'])->name('front.kategori');
 Route::get('/urunler/{id}', [FrontendController::class, 'urunler'])->name('front.urunler');

 Route::post('/search', [FrontendController::class, 'search'])->name('front.search');
 Route::get('/urun-detay/{id}', [FrontendController::class, 'urundetay'])->name('front.urundetay');

 Route::get('/tarim-makinalari/{slug1}/{slug2}', [FrontendController::class, 'seo'])->name('front.tarim-makinalari');

 /*

 Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
 Route::get('/user/forgot-password', [AuthController::class, 'forgotPassword'])->name('user.forgotPassword');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'middleware' =>['auth' , 'user.type:user' ] ,
    'prefix' =>'user' ,
    'as' => 'user.'


    ] , function(){

       /// dashboard start
   Route::get('/dashboard' , [DashboardController::class , 'index'] )
   ->name('dashboard.index');



   Route::get('/profile' , [UserProfileController::class , 'index'] )
   ->name('profile.index');

   Route::put('/profile' , [UserProfileController::class , 'update'] )
   ->name('profile.update');

   Route::put('/profile-password' , [UserProfileController::class , 'passwordUpdate'] )
   ->name('profile.password.update');




});



*/


Route::get('/password1', function () {
    $veri = Hash::make("123456");
    return $veri;
});

require __DIR__.'/auth.php';

