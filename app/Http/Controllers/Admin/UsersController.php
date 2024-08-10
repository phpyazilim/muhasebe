<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; 
use App\Traits\FileUploadTrait;
use Auth;

class UsersController extends Controller
{
    use FileUploadTrait; 

    public function __construct()  { 
        $this->middleware('checkUserPermission:kullanicilar');
 
   }

    
    function index():View {
         
        $users = getUsers(2);
        $yetkiler = getAllYetkiByArray();
       
        return view("admin.users.list" , compact('users','yetkiler') );
  
   }




   function add():View  {
    return view("admin.users.add" );
   }


 

  function update_form($id):View {

    $user = User::findOrFail($id);
    return view('admin.users.update', compact('user','id') );

  } 




  public function update( Request $request,$id ) :RedirectResponse {   
   
        $user = User::findOrFail($id);
  
     if($request->gelenForm == "profil") {
        $avatarPath = $this->uploadImage( $request , 'avatar' ,$request->old_avatar   );
      
        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->yetki_id = $request->yetki_id;

     }
     

     if($request->gelenForm == "sifre") {

        $request->validate(
            [   // şifre tekrarının namesi password_confirmation olduğu için otomatık tanımlıyor
                'password' => ['required', 'min:3', 'confirmed' ]
            ],[
                'password.required' => 'Şifre alanı zorunludur.',
                'password.min' => 'Şifre en az 3 karakter olmalıdır.',
                'password.confirmed' => 'Şifreler eşleşmiyor.',
            ]
            );

            $user->password = bcrypt($request->password);   
 

    }

    
        $user->save();
        toastr()->success('Güncelleme işlemi başarılı');
         return redirect()->back(); 
   
    
    }


  public function save( Request $request ) :RedirectResponse {   
   
       
    
    $request->validate(
        [   // şifre tekrarının namesi password_confirmation olduğu için otomatık tanımlıyor
            'password' => ['required', 'min:3', 'confirmed' ]
        ],[
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 3 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ]
        );

    
        $avatarPath = $this->uploadImage( $request , 'avatar' , "/default/avatar.png"  );


        $useri = new User;
        $useri->avatar = !empty($avatarPath) ? $avatarPath : "default/avatar.png";
        $useri->name = $request->name;
        $useri->email = $request->email;
        $useri->phone = $request->phone;
        $useri->yetki_id = $request->yetki_id;
        $useri->user_type =  "admin";
        $useri->password = bcrypt($request->password);   
        $useri->save();

        toastr()->success('Kayıt başarıyla eklendi');
         return redirect()->back(); 
   
    
    }



   


    
    function remove($id):RedirectResponse  {

        $user = User::findOrFail($id);
        $user->delete();

   

        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();

    }





}
