<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistemkullanicilari;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\File;



class SistemkullanicilariController extends Controller
{
    use FileUploadTrait;


    public function __construct()  {
        $this->middleware('checkUserPermission:sistemkullanicilari');
       
    }


    public function index() {

        $kullanicilar =  Sistemkullanicilari::orderBy('id', 'desc')->get();


        return view('admin.sistemkullanicilari.list' , compact('kullanicilar') );

    }



    function add():View {

        return view('admin.sistemkullanicilari.add'  );
    }


    function save(Request $request):RedirectResponse {

        $firmaadi = $request->firmaadi;
        $firmaemail = $request->firmaemail;
        $firmatelefon = $request->firmatelefon;

        $kullanici = new Sistemkullanicilari();
        $kullanici->firma_adi = $firmaadi;
        $kullanici->firma_email = $firmaemail;
        $kullanici->firma_telefon = $firmatelefon;
        $kullanici->save();

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();



    }




    function remove($id):RedirectResponse  {

        $lang = Sistemkullanicilari::findOrFail($id);
  
        $lang->delete();
        toastr()->success('silme işlemi başarılı');
        return redirect()->back();

    }



    function isActiveSetter(Request $request, $id) {
        echo "---------------------";
        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Sistemkullanicilari::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }

    function update_form($id):View {
        $kullanici= Sistemkullanicilari::findOrFail($id);

        return view('admin.sistemkullanicilari.update', compact('kullanici')  );
    }



}
