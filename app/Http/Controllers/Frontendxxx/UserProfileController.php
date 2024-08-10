<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Frontend\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Traits\FileUploadTrait; 


class UserProfileController extends Controller
{
    use FileUploadTrait;

    
    public function index():View  {
        $user = Auth::user();
       return view('frontend.dashboard.profile.index',compact('user'));
    }


    
    public function dashboard():View  {
        $user = Auth::user();
        return view('frontend.auth.dashboard',compact('user'));
    }







    public function update(UserUpdateRequest $request ) :RedirectResponse{
       // dd($request->all());

        $avatarPath = $this->uploadImage( $request , 'avatar' ,$request->old_avatar   );
        $user = Auth::user();
        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->adres = $request->adres;
    
        $user->save();
        toastr()->success('Güncelleme işlemi başarılı'); 
      

        return redirect()->back();


    }


    function passwordUpdate( Request $request ):RedirectResponse {

      //  dd($request->all());
        
             $request->validate(
               [   // şifre tekrarının namesi password_confirmation olduğu için otomatık tanımlıyor
                   'password' => ['required', 'min:3', 'confirmed' ]
               ],[
                   'password.required' => 'Şifre alanı zorunludur.',
                   'password.min' => 'Şifre en az 3 karakter olmalıdır.',
                   'password.confirmed' => 'Şifreler eşleşmiyor.',
               ]
               );
   
               $user = Auth::user(); // Auth modelindeki tüm kullanıcılara ularşır
               $user->password = bcrypt($request->password);   // hash olarak şifreler 
               $user->save();
               toastr()->success('Güncelleme işlemi başarılı'); 
               return redirect()->back();
   
           
   
       }



}
