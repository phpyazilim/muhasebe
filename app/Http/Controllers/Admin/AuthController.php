<?php

namespace App\Http\Controllers\Admin;
 use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
 

class AuthController extends Controller
{
    function login( ) {
      // Auth::guard('web')->logout();
       
     // $request->session()->invalidate();
     // $request->session()->regenerateToken();
 

     if (Auth::check() && Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard.index');
     }  

     

       return view('auth.login');
    }


    
   

    
    function forgotPassword() :View{
        return view('admin.auth.forgot-password');
    }


}
