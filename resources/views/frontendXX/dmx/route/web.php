<?php


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/* Route::fallback(function () {
    return view('errors.404');
});
 */


Route::get('/aaa', [FrontendController::class, 'iletisim'])->name('contact.asd');



Route::post('/contact-send', [SendMailController::class, 'iletisimsend'])->name('contact.send');



 Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
 Route::get('/user/forgot-password', [AuthController::class, 'forgotPassword'])->name('user.forgotPassword');

 

 
Route::group([
    'middleware' =>['auth' , 'user.type:user' ] ,
    'prefix' =>'user' ,
    'as' => 'user.'


    ] , function(){
 

   Route::get('/dashboard' , [UserProfileController::class , 'dashboard'] )
   ->name('user.dashboard');

   Route::put('/profile' , [UserProfileController::class , 'update'] )
   ->name('profile.update');

   Route::put('/profile-password' , [UserProfileController::class , 'passwordUpdate'] )
   ->name('profile.password.update');


});



 

Route::get('/', [FrontendController::class, 'index'])->name('front.home');









 

  Route::get('/', [FrontendController::class, 'index'])->name('front.home'); 
 Route::get('/iletisim', [FrontendController::class, 'iletisim'])->name('front.iletisim');
 Route::get('/kurumsal/{id}', [FrontendController::class, 'icerik'])->name('front.icerik');
 Route::get('/sayfa/{id}', [FrontendController::class, 'sayfa'])->name('front.sayfa');
 Route::get('/referans', [FrontendController::class, 'referans'])->name('front.referans');
 Route::get('/blog', [FrontendController::class, 'haberler'])->name('front.blog');
 Route::get('/blog-detay/{id}', [FrontendController::class, 'haberdetay'])->name('front.blogdetay');
 Route::get('/blog-kategori/{id}', [FrontendController::class, 'blogkategori'])->name('front.blogkategori');
 Route::post('/blog-ara', [FrontendController::class, 'haberara'])->name('front.blogara');
 Route::get('/resim-galeri', [FrontendController::class, 'resimgaleri'])->name('front.resimgaleri');
 Route::get('/video-galeri', [FrontendController::class, 'videogaleri'])->name('front.videogaleri');
 Route::get('/basvuru-step1', [FrontendController::class, 'basvurustep1'])->name('front.basvurustep1');
 Route::post('/basvuru-step2', [FrontendController::class, 'basvurustep2'])->name('front.basvurustep2');
 Route::post('/basvuru-save', [FrontendController::class, 'basvurusave'])->name('front.basvurusave');
 Route::get('/basvuru-sonuc', [FrontendController::class, 'basvurusonuc'])->name('front.basvurusonuc');
 Route::get('/paketler', [FrontendController::class, 'paketler'])->name('front.paketler');
 

 // Route::get('/kategori', [FrontendController::class, 'kategori'])->name('front.kategori');
 // Route::get('/urunler/{id}', [FrontendController::class, 'urunler'])->name('front.urunler');

 // Route::post('/search', [FrontendController::class, 'search'])->name('front.search');
 // Route::get('/urun-detay/{id}', [FrontendController::class, 'urundetay'])->name('front.urundetay');

 // Route::get('/tarim-makinalari/{slug1}/{slug2}', [FrontendController::class, 'seo'])->name('front.tarim-makinalari');

 


 



Route::get('/password', function () {
    $veri = Hash::make("123456");
    return $veri;
});

Route::get('/phpinfo',function (){ echo phpinfo();});


require __DIR__.'/auth.php';

