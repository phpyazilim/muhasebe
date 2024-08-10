<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Lang;
use App\Models\Icerik;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LangController extends Controller {

    use FileUploadTrait;

    public function __construct()  {
        $this->middleware('checkUserPermission:diller');
     
   }



    function index():View {
        $diller = Lang::all()->sortBy('sira');
        return view('admin.lang.list', compact('diller')  );

    }

    function add():View {
        return view('admin.lang.add'  );
    }



    function save(Request $request):RedirectResponse {

        $iconPath = $this->uploadImage( $request , 'icon' ,$request->old_background  );

        $lang = new Lang();
        $lang->baslik = $request->baslik;
        $lang->kisabaslik = $request->kisabaslik;
        $lang->kod = $request->kod;
        $lang->icon = $iconPath;
        $lang->save();

        $getAllContent = Content::where('lang','tr')->get();


        foreach ($getAllContent as $icerik) {

            $content = new Content();
            $content ->parent = $icerik->parent;
            $content ->parentId = $icerik->parentId;
            $content ->lang = $request->kod;
            $content ->baslik = $icerik->baslik;
            $content ->url = $icerik->url;
            $content->baslik2 = $icerik->baslik2;
            $content->kisaaciklama = $icerik->kisaaciklama;
            $content->aciklama = $icerik->aciklama;
            $content->tarih = $icerik->tarih;
            $content->tag =     $icerik->tag;
            $content->link =    $icerik->link;
            $content->deger1 =  $icerik->deger1;
            $content->deger2 =  $icerik->deger2;
            $content->deger3 =  $icerik->deger3;
            $content->link =    $icerik->link;
            $content ->dosya1 = $icerik->dosya1;
            $content ->dosya2 = $icerik->dosya2;
            $content ->dosya3 = $icerik->dosya3;
            $content ->save();

        }




        toastr()->success('Kayıt işlemi başarılı');
         return redirect()->back();

    }


    function update_form($id):View {
        $lang = Lang::findOrFail($id);

        return view('admin.lang.update', compact('lang')  );
    }



    function update(Request $request, $id):RedirectResponse {

        $iconPath = $this->uploadImage( $request , 'icon' ,$request->old_background  );

        $deger = array(
            'baslik' => $request->baslik,
            'kisabaslik' => $request->kisabaslik,
            'kod' => $request->kod,
            'icon' => $iconPath
        );


        Lang::where('id', $id)->update($deger);



        toastr()->success('Güncelleme işlemi başarılı');
         return redirect()->back();


    }



    function ranksetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {

            $lang = Lang::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }


      //  return response()->json(['success' => true, 'message' => 'Form başarıyla gönderildi!']);


    }



    function isActiveSetter(Request $request, $id) {
        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Lang::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }




    function remove($id):RedirectResponse  {

       //$getLang = Lang::find($id);
        $lang = Lang::findOrFail($id);

        Content::where('lang',$lang->kod)->delete();


        $lang->delete();
        toastr()->success('silme işlemi başarılı');
        return redirect()->back();

    }



}
