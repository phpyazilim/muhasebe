<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Lang;
use App\Models\Markalar;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarkaController extends Controller
{
    use FileUploadTrait;

    public function __construct()  {
        $this->middleware('checkUserPermission:markalar');
       
   }


    function index():View {
        $markalar = Markalar::all()->sortBy('sira');
        return view('admin.marka.list', compact('markalar')  );

    }



    function add():View {
        return view('admin.marka.add'  );
    }

    function save(Request $request):RedirectResponse {

        $iconPath = $this->uploadImage( $request , 'icon' ,$request->old_logo  );

        $marka = new Markalar();
        $marka->baslik = $request->baslik;
        $marka->link = $request->link;
        $marka->logo = $iconPath;
        $marka->save();



        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }



    function update_form($id):View {
        $marka= Markalar::findOrFail($id);

        return view('admin.marka.update', compact('marka')  );
    }



    function update(Request $request, $id):RedirectResponse {

        $iconPath = $this->uploadImage( $request , 'icon' ,$request->old_logo  );

        $deger = array(
            'baslik' => $request->baslik,
            'link' => $request->link,
            'logo' => $iconPath
        );

        Markalar::where('id', $id)->update($deger);

        toastr()->success('Güncelleme işlemi başarılı');
        return redirect()->back();

    }




    function remove($id):RedirectResponse  {

        $lang = Markalar::findOrFail($id);

        Content::where('id',$id)->delete();


        $lang->delete();
        toastr()->success('silme işlemi başarılı');
        return redirect()->back();

    }




    function ranksetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {

            $lang = Markalar::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }

    }



    function isActiveSetter(Request $request, $id) {
        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Markalar::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }



}
