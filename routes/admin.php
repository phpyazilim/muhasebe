<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AyarlarController;
use App\Http\Controllers\Admin\CevirilerController;
use App\Http\Controllers\Admin\IcerikController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MarkaController;
use App\Http\Controllers\Admin\YetkiController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\SistemkullanicilariController;
use Illuminate\Support\Facades\Route;



//Route::get('/admin', function () {
//    return redirect()->route('admin.dashboard.index');
//});

 Route::get('/admin/login' , [AuthController::class , 'login'] )->name('admin.login');
 Route::get('/yonetim' , [AuthController::class , 'login'] )->name('admin.giris');
 Route::get('/admin/forgot-password' , [AuthController::class , 'forgotPassword'] )->name('admin.forgotPassword');



//Route::group([], function() );

Route::group([
     'middleware' =>['auth' , 'user.type:admin' ] ,
     'prefix' =>'admin' ,
     'as' => 'admin.'

     ] , function(){

        /// dashboard start
    Route::get('/dashboard' , [DashboardController::class , 'index'] )
    ->name('dashboard.index');




    Route::get('/profile' , [ProfileController::class , 'index'] )
    ->name('profile.index');

    /// dashboard end


   // profil updated
    Route::put('/profile' , [ProfileController::class , 'update'] )
    ->name('profile.update');

   // profil  password updated
    Route::put('/profile-password' , [ProfileController::class , 'passwordUpdate'] )
    ->name('profile-password.update');


    /*
   // slider
    Route::get('/slider' , [SliderController::class , 'index'] )->name('slider.index');
    Route::put('/slider' , [SliderController::class , 'insert'] )->name('slider.insert');
    Route::delete('/slider{id}' , [SliderController::class , 'destroy'] )->name('slider.destroy');
    Route::get('/slider/{id}/edit' , [SliderController::class , 'edit'] )->name('slider.edit');
    Route::put('/slider/{id}/update' , [SliderController::class , 'update'] )->name('slider.update');
    */



    // ayarlar
    Route::get('/ayarlar/iletisim' , [AyarlarController::class , 'iletisim'] )->name('ayarlar.iletisim');
    Route::get('/ayarlar/logo' , [AyarlarController::class , 'logo'] )->name('ayarlar.logo');
    Route::get('/ayarlar/harita' , [AyarlarController::class , 'harita'] )->name('ayarlar.harita');
    Route::get('/ayarlar/analytics' , [AyarlarController::class , 'analytics'] )->name('ayarlar.analytics');
    Route::get('/ayarlar/sosyal' , [AyarlarController::class , 'sosyal'] )->name('ayarlar.sosyal');
    Route::get('/ayarlar/seo' , [AyarlarController::class , 'seo'] )->name('ayarlar.seo');
    Route::get('/ayarlar/tasarim' , [AyarlarController::class , 'tasarim'] )->name('ayarlar.tasarim');
    Route::get('/ayarlar/kod' , [AyarlarController::class , 'kod'] )->name('ayarlar.kod');
    Route::put('/ayarlar/update' , [AyarlarController::class , 'update'] )->name('ayarlar.update');



     // lang
    Route::get('/lang' , [LangController::class , 'index'] )->name('lang.index');
    Route::post('/lang/ranksetter' , [LangController::class , 'ranksetter'] )->name('lang.ranksetter');
    Route::post('/lang/isActiveSetter/{id}' , [LangController::class , 'isActiveSetter'] )->name('lang.isActiveSetter');
    Route::delete('/lang/{id}' , [LangController::class , 'remove'] )->name('lang.remove');
    Route::get('/lang/add' , [LangController::class , 'add'] )->name('lang.add');
    Route::put('/lang/save' , [LangController::class , 'save'] )->name('lang.save');
    Route::get('/lang/update_form/{id}' , [LangController::class , 'update_form'] )->name('lang.update_form');
    Route::put('/lang/update/{id}' , [LangController::class , 'update'] )->name('lang.update');



    // ceviriler
    Route::get('/translate' , [CevirilerController::class , 'index'] )->name('translate.index');
    Route::get('/translate/add' , [CevirilerController::class , 'add'] )->name('translate.add');
    Route::put('/translate/save' , [CevirilerController::class , 'save'] )->name('translate.save');
    Route::delete('/translate/remove/{id}' , [CevirilerController::class , 'remove'] )->name('translate.remove');
    Route::get('/translate/update_form/{id}' , [CevirilerController::class , 'update_form'] )->name('translate.update_form');
    Route::put('/translate/update/{id}' , [CevirilerController::class , 'update'] )->name('translate.update');


    // menuler
    Route::get('/menu' , [MenuController::class , 'index'] )->name('menu.index');
    Route::get('/menu/add' , [MenuController::class , 'add'] )->name('menu.add');
    Route::put('/menu/save' , [MenuController::class , 'save'] )->name('menu.save');
    Route::delete('/menu/remove/{id}' , [MenuController::class , 'remove'] )->name('menu.remove');
    Route::get('/menu/update_form/{id}' , [MenuController::class , 'update_form'] )->name('menu.update_form');
    Route::put('/menu/update/{id}' , [MenuController::class , 'update'] )->name('menu.update');




    // içerik
    Route::get('/icerik/{id}' , [IcerikController::class , 'index'] )->name('icerik.index');
    Route::get('/icerik/add/{id}' , [IcerikController::class , 'add'] )->name('icerik.add');
    Route::get('/icerik/image/{id}' , [IcerikController::class , 'image'] )->name('icerik.image');
    Route::post('/icerik/refresh_image_list/{id}' , [IcerikController::class , 'refresh_image_list'] )->name('icerik.refresh_image_list');
    Route::post('/icerik/file_upload/{id}' , [IcerikController::class , 'file_upload'] )->name('icerik.file_upload');
    Route::put('/icerik/save/{id}' , [IcerikController::class , 'save'] )->name('icerik.save');
    Route::delete('/icerik/remove/{id}' , [IcerikController::class , 'remove'] )->name('icerik.remove');
    Route::get('/icerik/update_form/{id}' , [IcerikController::class , 'update_form'] )->name('icerik.update_form');
    Route::put('/icerik/update/{id}' , [IcerikController::class , 'update'] )->name('icerik.update');
    Route::post('/icerik/ranksetter' , [IcerikController::class , 'ranksetter'] )->name('icerik.ranksetter');
    Route::post('/icerik/isActiveSetter/{id}' , [IcerikController::class , 'isActiveSetter'] )->name('icerik.isActiveSetter');
    Route::post('/icerik/imageIsActiveSetter/{id}/{parentId}/{parent}' , [IcerikController::class , 'imageIsActiveSetter'] )->name('icerik.imageIsActiveSetter');
    Route::post('/icerik/imageIsCoverSetter/{id}/{parentId}' , [IcerikController::class , 'imageIsCoverSetter'] )->name('icerik.imageIsCoverSetter');
    Route::delete('/icerik/imageDelete/{id}' , [IcerikController::class , 'imageDelete'] )->name('icerik.imageDelete');
    Route::post('/icerik/imageRankSetter' , [IcerikController::class , 'imageRankSetter'] )->name('icerik.imageRankSetter');



    // categories
    Route::get('/categories' , [CategoriesController::class , 'index'] )->name('categories.index');
    Route::get('/categories/add' , [CategoriesController::class , 'add'] )->name('categories.add');
    Route::post('/categories/ranksetter' , [CategoriesController::class , 'ranksetter'] )->name('categories.ranksetter');
    Route::put('/categories/save' , [CategoriesController::class , 'save'] )->name('categories.save');
    Route::post('/categories/isActiveSetter/{id}' , [CategoriesController::class , 'isActiveSetter'] )->name('categories.isActiveSetter');
    Route::delete('/categories/remove/{id}' , [CategoriesController::class , 'remove'] )->name('categories.remove');
    Route::get('/categories/update_form/{id}' , [CategoriesController::class , 'update_form'] )->name('categories.update_form');
    Route::put('/categories/update/{id}' , [CategoriesController::class , 'update'] )->name('categories.update');


    // product
    Route::get('/product' , [ProductController::class , 'index'] )->name('product.index');
    Route::get('/product/add' , [ProductController::class , 'add'] )->name('product.add');
    Route::post('/product/ranksetter' , [ProductController::class , 'ranksetter'] )->name('product.ranksetter');
    Route::put('/product/save' , [ProductController::class , 'save'] )->name('product.save');
    Route::post('/product/isActiveSetter/{id}' , [ProductController::class , 'isActiveSetter'] )->name('product.isActiveSetter');
    Route::delete('/product/remove/{id}' , [ProductController::class , 'remove'] )->name('product.remove');
    Route::get('/product/update_form/{id}' , [ProductController::class , 'update_form'] )->name('product.update_form');
    Route::put('/product/update/{id}' , [ProductController::class , 'update'] )->name('product.update');
       // product resim bölümü


    Route::get('/product/image/{id}' , [ProductController::class , 'image'] )->name('product.image');
    Route::post('/product/imageIsActiveSetter/{id}/{parentId}/{parent}' , [ProductController::class , 'imageIsActiveSetter'] )->name('product.imageIsActiveSetter');
    Route::post('/product/imageIsCoverSetter/{id}/{parentId}/' , [ProductController::class , 'imageIsCoverSetter'] )->name('product.imageIsCoverSetter');
    Route::delete('/product/imageDelete/{id}' , [ProductController::class , 'imageDelete'] )->name('product.imageDelete');
    Route::post('/product/file_upload/{id}' , [ProductController::class , 'file_upload'] )->name('product.file_upload');
    Route::post('/product/imageRankSetter' , [ProductController::class , 'imageRankSetter'] )->name('product.imageRankSetter');
    Route::post('/product/refresh_image_list/{id}' , [ProductController::class , 'refresh_image_list'] )->name('product.refresh_image_list');



    // slider
    Route::get('/slider' , [SliderController::class , 'index'] )->name('slider.index');
    Route::get('/slider/add/' , [SliderController::class , 'add'] )->name('slider.add');
    Route::put('/slider/save' , [SliderController::class , 'save'] )->name('slider.save');
    Route::post('/slider/ranksetter' , [SliderController::class , 'ranksetter'] )->name('slider.ranksetter');
    Route::post('/slider/isActiveSetter/{id}' , [SliderController::class , 'isActiveSetter'] )->name('slider.isActiveSetter');
    Route::delete('/slider/remove/{id}' , [SliderController::class , 'remove'] )->name('slider.remove');
    Route::get('/slider/update_form/{id}' , [SliderController::class , 'update_form'] )->name('slider.update_form');
    Route::put('/slider/update/{id}' , [SliderController::class , 'update'] )->name('slider.update');


    // markalar
    Route::get('/marka' , [MarkaController::class , 'index'] )->name('marka.index');
    Route::get('/marka/add' , [MarkaController::class , 'add'] )->name('marka.add');
    Route::post('/marka/ranksetter' , [MarkaController::class , 'ranksetter'] )->name('marka.ranksetter');
    Route::post('/marka/isActiveSetter/{id}' , [MarkaController::class , 'isActiveSetter'] )->name('marka.isActiveSetter');
    Route::delete('/marka/remove/{id}' , [MarkaController::class , 'remove'] )->name('marka.remove');
    Route::get('/marka/update_form/{id}' , [MarkaController::class , 'update_form'] )->name('marka.update_form');
    Route::put('/marka/save' , [MarkaController::class , 'save'] )->name('marka.save');
    Route::put('/marka/update/{id}' , [MarkaController::class , 'update'] )->name('marka.update');



     // yekiler
     Route::get('/yetki' , [YetkiController::class , 'index'] )->name('yetki.index');
     Route::get('/yetki/add/' , [YetkiController::class , 'add'] )->name('yetki.add');
     Route::put('/yetki/save' , [YetkiController::class , 'save'] )->name('yetki.save'); 
     Route::delete('/yetki/remove/{id}' , [YetkiController::class , 'remove'] )->name('yetki.remove');
     Route::get('/yetki/update_form/{id}' , [YetkiController::class , 'update_form'] )->name('yetki.update_form');
     Route::put('/yetki/update/{id}' , [YetkiController::class , 'update'] )->name('yetki.update');


     // kullanıcılar
     Route::get('/users' , [UsersController::class , 'index'] )->name('users.index');
     Route::get('/users/add/' , [UsersController::class , 'add'] )->name('users.add');

     Route::put('/users/save' , [UsersController::class , 'save'] )->name('users.save'); 
     Route::delete('/users/remove/{id}' , [UsersController::class , 'remove'] )->name('users.remove');
     Route::get('/users/update_form/{id}' , [UsersController::class , 'update_form'] )->name('users.update_form');
     Route::put('/users/update/{id}' , [UsersController::class , 'update'] )->name('users.update');
   
     Route::get('/profilim' , [DashboardController::class , 'profilimiguncelle'] )->name('users.profilimiguncelle');

 

     Route::get('/files', [FileController::class, 'index'])->name('files.index');
     Route::get('/files/edit/{file}', [FileController::class, 'edit'])->name('files.edit');
     Route::put('/files/update/{file}', [FileController::class, 'update'])->name('files.update');





          // sistemkullanicilari
          Route::get('/sistemkullanicilari' , [SistemkullanicilariController::class , 'index'] )->name('sistemkullanicilari.index');
          Route::get('/sistemkullanicilari/add/' , [SistemkullanicilariController::class , 'add'] )->name('sistemkullanicilari.add');
          Route::put('/sistemkullanicilari/save' , [SistemkullanicilariController::class , 'save'] )->name('sistemkullanicilari.save'); 
          Route::delete('/sistemkullanicilari/remove/{id}' , [SistemkullanicilariController::class , 'remove'] )->name('sistemkullanicilari.remove');
          Route::get('/sistemkullanicilari/update_form/{id}' , [SistemkullanicilariController::class , 'update_form'] )->name('sistemkullanicilari.update_form');
          Route::put('/sistemkullanicilari/update/{id}' , [SistemkullanicilariController::class , 'update'] )->name('sistemkullanicilari.update');
     
 

});


?>
