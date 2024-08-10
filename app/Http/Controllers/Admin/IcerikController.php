<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\File;
use App\Models\Lang;
use App\Models\Menu;
use App\Models\Icerik;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IcerikController extends Controller {

    use FileUploadTrait;

    public function __construct()  {
        $this->middleware('checkUserPermission:iceriksayfalar');
   
     
   }




     function index($id):View {

         $menuInfo = Menu::where('id', $id)->first();
         $getMenu = getMenuByMenuId($menuInfo->id);
     
         return view('admin.icerik.list', compact( 'id','menuInfo','getMenu')  );

     }


     function image($id):View {

         $files = File::where('parent', 'icerik')
             ->where('parentId', $id)
             ->orderBy('sira', 'asc')
             ->get();


         return view('admin.icerik.image', compact( 'id','files')  );

     }





     function add($id):View {

      //   $diller = Lang::all()->sortBy('sira');

         $menuInfo = Menu::where('id', $id)->first();
         $icerikKat = array();
         if ($menuInfo !== null && $menuInfo->icerik_kategori_id_belirle > 0) {
             $icerikKat = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
                 ->where('contents.parent', '=', 'icerik')
                 ->where('contents.lang', '=', 'tr')
                 ->where('iceriks.parentId', '=', $menuInfo->icerik_kategori_id_belirle)
                 ->select('iceriks.*', 'contents.*')
                 ->orderBy('iceriks.sira', 'asc')
                 ->get();
         }


         return view('admin.icerik.add', compact( 'id', 'menuInfo','icerikKat')  );
     }




    function save(Request $request,$id):RedirectResponse {


      //  $diller = Lang::all()->sortBy('sira');

        $dosya1Path="";
        $dosya2Path="";
        $dosya3Path="";


     if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1', $request->old_dosya1);
           echo "dosya1 var ";
        }


        if ($request->has('dosya2')) {
            $dosya2Path = $this->uploadImage($request, 'dosya2', $request->old_dosya2);
        }

        if ($request->has('dosya3')) {
            $dosya3Path = $this->uploadImage($request, 'dosya3', $request->old_dosya3);
        }


         $icerik = new Icerik();
         $icerik->parentId = $id;
         $icerik->category = isset($request->category) ? $request->category : 0;
         $icerik->isActive = 1;
         $icerik->sira = 0;
         $icerik->save();


        foreach (getLangs() as $dil ) {

            $content = new Content();
            $content ->parent = "icerik";
            $content ->parentId = $icerik->id;
            $content ->lang = $dil->kod;
            $content ->baslik = $request->input('baslik_'.$dil->kod);
            $content ->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
            $content->baslik2 = !is_null($request->input('baslikiki_'.$dil->kod)) ? $request->input('baslikiki_'.$dil->kod) :  "";
            $content->kisaaciklama = !is_null($request->input('kisaaciklama_'.$dil->kod)) ? $request->input('kisaaciklama_'.$dil->kod) :  "";
            $content->aciklama = !is_null($request->input('aciklama_'.$dil->kod)) ? $request->input('aciklama_'.$dil->kod) :  "";
            $content->tarih = !is_null($request->input('tarih')) ? $request->input('tarih') :  "";
            $content->tag = !is_null($request->input('tag_'.$dil->kod)) ? $request->input('tag_'.$dil->kod) :  "";
            $content->link = !is_null($request->input('link_'.$dil->kod)) ? $request->input('link_'.$dil->kod) :  "";
            $content->deger1 = !is_null($request->input('deger1_'.$dil->kod)) ? $request->input('deger1_'.$dil->kod) :  "";
            $content->deger2 = !is_null($request->input('deger2_'.$dil->kod)) ? $request->input('deger2_'.$dil->kod) :  "";
            $content->deger3 = !is_null($request->input('deger3_'.$dil->kod)) ? $request->input('deger3_'.$dil->kod) :  "";
            $content->link = !is_null($request->input('link_'.$dil->kod)) ? $request->input('link_'.$dil->kod) :  "";
            $content ->dosya1 = $dosya1Path;
            $content ->dosya2 = $dosya2Path;
            $content ->dosya3 = $dosya3Path;

            $content ->save();

        }

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();


    }

    function isActiveSetter(Request $request, $id) {

        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Icerik::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }





    function ranksetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {


            $lang = Icerik::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }



    }


    function imageIsCoverSetter(Request $request, $id,$parentId) {

        File::where('id', $id)
              ->update(['isCover' => 1]);


        File::where('parentId', $parentId)
            ->where('id', '!=', $id)
            ->where('parent', "icerik")
            ->update(['isCover' => 0]);



        $files = File::where('parent', 'icerik')
            ->where('parentId', $parentId)
            ->orderBy('sira', 'asc')
            ->get();

       return view('admin.icerik.image_refresh_list',compact('files'));


    }


        function imageIsActiveSetter(Request $request, $id,$parentId,$parent ) {

        //  echo "  **********$id,$parentId,$parent ************   ";
          $drm =  ($request->data === "true") ? 1 : 0;
            File::where('parentId', $parentId)
                ->where('id', $id)
                ->where('parent', $parent)
                ->update(['isActive' => $drm]);


    }




    function imageDelete($id):RedirectResponse {
        File::where('id', $id)->delete();
        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();

    }


    function imageRankSetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {


            $lang = File::find($id);
            $lang->sira =$sira;
            $lang->save();

        }

    }



    function update_form($id):View {


        $dildeger=array();

        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.parentId', '=', $id)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();


        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

        $icerik = Icerik::find($id);


        $menuInfo = Menu::where('id', $icerik->parentId)->first();
        $icerikKat = array();
        if ($menuInfo !== null && $menuInfo->icerik_kategori_id_belirle > 0) {
            $icerikKat = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
                ->where('contents.parent', '=', 'icerik')
                ->where('contents.lang', '=', 'tr')
                ->where('iceriks.parentId', '=', $menuInfo->icerik_kategori_id_belirle)
                ->select('iceriks.*', 'contents.*')
                ->orderBy('iceriks.sira', 'asc')
                ->get();
        }


        return view('admin.icerik.update' , compact( 'dildeger','id','icerik','menuInfo','icerikKat')  );
    }



    function update(Request $request,$id):RedirectResponse {


        $getIcerik = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.parentId', '=', $id)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();


        $dosya1Path=$request->old_dosya1;
        $dosya2Path=$request->old_dosya2;
        $dosya3Path= $request->old_dosya3;


        if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1', $request->old_dosya1);
            echo "dosya1 var ";
        }

        if ($request->has('dosya2')) {
            $dosya2Path = $this->uploadImage($request, 'dosya2', $request->old_dosya2);
        }

        if ($request->has('dosya3')) {
            $dosya3Path = $this->uploadImage($request, 'dosya3', $request->old_dosya3);
        }

        $icerik = Icerik::find($id);
        $icerik->category = isset($request->category) ? $request->category : 0;
        $icerik->save();

        foreach (getLangs() as $dil ) {

            $content = Content::where('parentId', $icerik->id)
                ->where('lang', $dil->kod)
                ->where('parent',  'icerik')
                ->first();

            if ($content) {

                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content->baslik2 = !is_null($request->input('baslikiki_'.$dil->kod)) ? $request->input('baslikiki_'.$dil->kod) :  "";
                $content->kisaaciklama = !is_null($request->input('kisaaciklama_'.$dil->kod)) ? $request->input('kisaaciklama_'.$dil->kod) :  "";
                $content->aciklama = !is_null($request->input('aciklama_'.$dil->kod)) ? $request->input('aciklama_'.$dil->kod) :  "";
                $content->tarih = !is_null($request->input('tarih')) ? $request->input('tarih') :  "";
                $content->tag = !is_null($request->input('tag_'.$dil->kod)) ? $request->input('tag_'.$dil->kod) :  "";
                $content->link = !is_null($request->input('link_'.$dil->kod)) ? $request->input('link_'.$dil->kod) :  "";
                $content->deger1 = !is_null($request->input('deger1_'.$dil->kod)) ? $request->input('deger1_'.$dil->kod) :  "";
                $content->deger2 = !is_null($request->input('deger2_'.$dil->kod)) ? $request->input('deger2_'.$dil->kod) :  "";
                $content->deger3 = !is_null($request->input('deger3_'.$dil->kod)) ? $request->input('deger3_'.$dil->kod) :  "";
                $content->dosya1 = $dosya1Path;
                $content->dosya2 = $dosya2Path;
                $content->dosya3 = $dosya3Path;
                $content->save();
            } else {
                $content = new Content();
                $content->parent = "icerik";
                $content->parentId = $icerik->id;
                $content->lang = $dil->kod;
                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content->baslik2 = !is_null($request->input('baslikiki_'.$dil->kod)) ? $request->input('baslikiki_'.$dil->kod) :  "";
                $content->kisaaciklama = !is_null($request->input('kisaaciklama_'.$dil->kod)) ? $request->input('kisaaciklama_'.$dil->kod) :  "";
                $content->aciklama = !is_null($request->input('aciklama_'.$dil->kod)) ? $request->input('aciklama_'.$dil->kod) :  "";
                $content->tarih = !is_null($request->input('tarih')) ? $request->input('tarih') :  "";
                $content->tag = !is_null($request->input('tag_'.$dil->kod)) ? $request->input('tag_'.$dil->kod) :  "";
                $content->link = !is_null($request->input('link_'.$dil->kod)) ? $request->input('link_'.$dil->kod) :  "";
                $content->deger1 = !is_null($request->input('deger1_'.$dil->kod)) ? $request->input('deger1_'.$dil->kod) :  "";
                $content->deger2 = !is_null($request->input('deger2_'.$dil->kod)) ? $request->input('deger2_'.$dil->kod) :  "";
                $content->deger3 = !is_null($request->input('deger3_'.$dil->kod)) ? $request->input('deger3_'.$dil->kod) :  "";
                $content->dosya1 = $dosya1Path;
                $content->dosya2 = $dosya2Path;
                $content->dosya3 = $dosya3Path;

                $content->save();
            }


        }

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }




    function remove($id):RedirectResponse  {

        $lang = Icerik::findOrFail($id);
        $lang->delete();

        Content::where('parent', 'icerik')
            ->where('parentId', $id)
            ->delete();

        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();

    }



      function refresh_image_list($id) {

          $files = File::where('parent', 'icerik')
              ->where('parentId', $id)
              ->orderBy('sira', 'asc')
              ->get();

          return view('admin.icerik.image_refresh_list',compact('files'));


    }

      function file_upload(Request $request, $id)  {

          $dosya1Path = $this->uploadImage($request, 'file', "");
          $content = new File();
          $content ->type = "image";
          $content ->parent = "icerik";
          $content ->parentId = $id;
          $content ->url =$dosya1Path;
          $content ->sira =0;
          $content ->isActive =1;
          $content ->isCover =0;
          $content ->save();



    }


}
