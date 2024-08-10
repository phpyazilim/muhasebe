<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yetki; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
 




class YetkiController extends Controller {  

  public function __construct()  {
       $this->middleware('checkUserPermission:yetkiler');
 
  }
    
    function index():View {
        $yetkiler = Yetki::all()->sortBy('id');
        return view("admin.yetki.list" , compact('yetkiler') );
   }

   function add():View  {
    return view("admin.yetki.add");
  }


  function save(Request $request):RedirectResponse {  

    $permissions=json_encode($request->input("permissions")); 
 

    $yetki = new Yetki();
    $yetki->baslik = $request->input("baslik");
    $yetki->permissions = $permissions;
    $yetki ->save();

    toastr()->success('Kayıt işlemi başarılı');
    return redirect()->back();



  } 


  


  
  function update_form($id):View {

    $yetki= Yetki::findOrFail($id);

    return view('admin.yetki.update', compact('yetki','id')  );
  } 


 
  function update(Request $request, $id):RedirectResponse  {
    
    $permissions=json_encode($request->input("permissions")); 
 

    $yetki = Yetki::findOrFail($id);
    $yetki->baslik = $request->input("baslik");
    $yetki->permissions = $permissions;
    $yetki ->save();

    toastr()->success('Güncelleme işlemi başarılı');
    return redirect()->back();

     


  }



  function remove($id):RedirectResponse  {

    $lang = Yetki::findOrFail($id);
    $lang->delete();

    

    toastr()->success('Silme işlemi başarılı');
    return redirect()->back();

}





}
