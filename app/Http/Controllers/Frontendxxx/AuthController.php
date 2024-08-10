<?php

namespace App\Http\Controllers\Frontend;
//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    function login( ) :View{
      
        // Request $request
 /*        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 */

        return view('frontend.auth.login');
    }

    function forgotPassword() :View{
        return view('frontend.auth.forgot-password');
    }


}
