<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    function index() :View {
      

  //  Auth::guard('web')->logout();
   //  dd(Auth::guard('web'));
 
/* use Illuminate\Support\Facades\Log;
 // storage\logs     
Log::channel('daily')->error('Bu bir error mesajıdır daily log kanalı için.');
Log::emergency('Sistem çöktü! Sunucuya müdahale gerekiyor.');
Log::alert('Uygulamanın ana servisi erişilemez durumda!');
Log::critical('Kritik bir hata oluştu! Veritabanı bağlantısı başarısız.');
Log::error('Dosya kaydedilirken hata oluştu: Dosya yazma izinleri eksik.');
Log::warning('Depolama alanı dolmak üzere! Hemen temizlik yapılmalı.');
Log::notice('Yeni kullanıcı kaydedildi: John Doe');
Log::info('Kullanıcı giriş yaptı: user@example.com');
Log::debug('API isteği gönderildi: GET /api/users');



 if (Auth::user()->isAdmin()) {
         echo "admin ";
    } else {
      echo "user ";
    }
       die();

// kullanıcı hiç giriş yapmamışsa error veriyor
 
*/
      //     dd(getLangs());

      return view('admin.dashboard.index');
     
    }


    

    public function profilimiguncelle() :View {

        $user = Auth::user();
        $id = $user->id;
        return view('admin.users.profilim' , compact('user','id') );


    }






}