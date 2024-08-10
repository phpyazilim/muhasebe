<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;

/************************/

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index() :View {

        $user = Auth::user();
        $id = $user->id;
        return view('admin.users.profilim' , compact('user','id') );


    }


    public function update(ProfileUpdateRequest $request ) :RedirectResponse {  // geriye responnse döndürsün
// formlar request sınıfından geçerek controllere gelir
// ProfileUpdateRequest



    $avatarPath = $this->uploadImage( $request , 'avatar' ,$request->old_avatar   );
    $user = Auth::user();
    $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->vergi_no = $request->vergi_no;
    $user->phone = $request->phone;
    $user->adres = $request->adres;
    $user->il = $request->il;
    $user->ilce = $request->ilce;
    $user->website = $request->website;
    $user->facebook = $request->facebook;
    $user->x_link = $request->x_link;
    $user->instagram = $request->instagram;

    $user->save();
    toastr()->success('Güncelleme işlemi başarılı');
     return redirect()->back(); /// geriye dön
   // dd( $avatarPath );

   // dd($request->all());

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

        //  dd($user);

    }
}