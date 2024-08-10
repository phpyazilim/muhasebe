<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Lang;
use App\Models\Menu;
use App\Models\Icerik;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{

    public function __construct()  {
        $this->middleware('checkUserPermission:menu');
   
   }


   function index() {


       $results = Menu::join('contents', 'menus.id', '=', 'contents.parentId')
           ->where('contents.parent', '=', 'menu')
           ->where('contents.lang', '=', 'tr')
           ->select('contents.*')
           ->get();


       return view('admin.menu.list', compact('results'));

   }




    function add():View {

        return view('admin.menu.add'   );
    }

    function save(Request $request):RedirectResponse {

     //   $diller = Lang::all()->sortBy('sira');


        $menu = new Menu();
        $menu->icerik_resim = isset($request->icerik_resim) ? '1' : '0';
        $menu->icerik_ekleme = isset($request->icerik_ekleme) ? '1' : '0';
        $menu->icerik_silme = isset($request->icerik_silme) ? '1' : '0';
        $menu->icerik_duzenleme = isset($request->icerik_duzenleme) ? '1' : '0';
        $menu->icerik_tarih_ekle = isset($request->icerik_tarih_ekle) ? '1' : '0';
        $menu->icerik_tag_ekle = isset($request->icerik_tag_ekle) ? '1' : '0';
        $menu->icerik_dosya1_ekle = isset($request->icerik_dosya1_ekle) ? '1' : '0';
        $menu->icerik_dosya2_ekle = isset($request->icerik_dosya2_ekle) ? '1' : '0';
        $menu->icerik_dosya3_ekle = isset($request->icerik_dosya3_ekle) ? '1' : '0';
        $menu->icerik_url_gosterme = isset($request->icerik_url_gosterme) ? '1' : '0';
        $menu->icerik_link_ekle = isset($request->icerik_link_ekle) ? '1' : '0';
        $menu->icerik_baslik2_ekle = isset($request->icerik_baslik2_ekle) ? '1' : '0';
        $menu->icerik_kisa_aciklama_ekle = isset($request->icerik_kisa_aciklama_ekle) ? '1' : '0';
        $menu->icerik_kategori_id_belirle = $request->icerik_kategori_id_belirle;
        $menu->icerik_aciklama_ekleme = isset($request->icerik_aciklama_ekleme) ? '1' : '0';
        $menu->icerik_isactive_gosterme = isset($request->icerik_isactive_gosterme) ? '1' : '0';
        $menu->icerik_siralama_ekleme = isset($request->icerik_siralama_ekleme) ? '1' : '0';

        $menu->save();



        foreach (getLangs() as $dil ) {

            $icerik = new Content();
            $icerik ->parent = "menu";
            $icerik ->parentId = $menu->id;
            $icerik ->lang = $dil->kod;
            $icerik ->baslik = $request->input('baslik_'.$dil->kod);
            $icerik ->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
            $icerik ->save();

        }


        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();


    }




    function remove($id):RedirectResponse  {


        $icerik = Icerik::where('parentId', $id)->first();
        if ($icerik) {
        $parentId = $icerik->parentId;
        $delContent = Content::find($parentId);
            if ($delContent) {
                $delContent->delete();
            }
        }

 

        $lang = Menu::findOrFail($id);
        $lang->delete();


        Content::where('parent', 'menu')
            ->where('parentId', $id)
            ->delete();


        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();


    }


    function update_form($id):View {
       // $diller = Lang::all()->sortBy('sira');

        $dildeger=array();
        $results = Menu::join('contents', 'menus.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'menu')
            ->where('contents.parentId', '=', $id)
            ->select('contents.*')
            ->get();

        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

        $menu = Menu::find($id);

        return view('admin.menu.update' , compact( 'dildeger','id','menu')  );
    }


    function update(Request $request, $id):RedirectResponse {

      //  $diller = Lang::all()->sortBy('sira');


        $menu = Menu::find($id);

        if ($menu) {
        $menu->icerik_resim = isset($request->icerik_resim) ? '1' : '0';
        $menu->icerik_ekleme = isset($request->icerik_ekleme) ? '1' : '0';
        $menu->icerik_silme = isset($request->icerik_silme) ? '1' : '0';
        $menu->icerik_duzenleme = isset($request->icerik_duzenleme) ? '1' : '0';
        $menu->icerik_tarih_ekle = isset($request->icerik_tarih_ekle) ? '1' : '0';
        $menu->icerik_tag_ekle = isset($request->icerik_tag_ekle) ? '1' : '0';
        $menu->icerik_dosya1_ekle = isset($request->icerik_dosya1_ekle) ? '1' : '0';
        $menu->icerik_dosya2_ekle = isset($request->icerik_dosya2_ekle) ? '1' : '0';
        $menu->icerik_dosya3_ekle = isset($request->icerik_dosya3_ekle) ? '1' : '0';
        $menu->icerik_url_gosterme = isset($request->icerik_url_gosterme) ? '1' : '0';
        $menu->icerik_link_ekle = isset($request->icerik_link_ekle) ? '1' : '0';
        $menu->icerik_baslik2_ekle = isset($request->icerik_baslik2_ekle) ? '1' : '0';
        $menu->icerik_kisa_aciklama_ekle = isset($request->icerik_kisa_aciklama_ekle) ? '1' : '0';
        $menu->icerik_kategori_id_belirle = $request->icerik_kategori_id_belirle;
        $menu->icerik_aciklama_ekleme = isset($request->icerik_aciklama_ekleme) ? '1' : '0';
        $menu->icerik_isactive_gosterme = isset($request->icerik_isactive_gosterme) ? '1' : '0';
        $menu->icerik_siralama_ekleme = isset($request->icerik_siralama_ekleme) ? '1' : '0';

        $menu->save();
        }





        foreach (getLangs() as $dil ) {

            $icerik = Content::where('parentId', $id)
                ->where('lang', $dil->kod)
                ->where('parent', 'menu')
                ->first();


            if ($icerik) {
                $icerik->baslik = $request->input('baslik_' . $dil->kod);
                $icerik ->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $icerik->save();
            }

        }


     toastr()->success('Kayıt işlemi başarılı');
     return redirect()->back();


    }








}
