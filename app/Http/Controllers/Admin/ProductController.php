<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Content;
use App\Models\File;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
//use Illuminate\Support\Facades\Auth;

 
class ProductController extends Controller
{
    use FileUploadTrait;


    public function __construct()  {
        $this->middleware('checkUserPermission:urunler');
      
      
    }



    function index(Request $request):View {


       
       return view('admin.product.list'  );
    }



    function add():View {

        return view('admin.product.add' );
    }



    function save(Request $request):RedirectResponse {


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



        $cat = new Product();
        $cat->parentId = isset($request->category) ? $request->category : 0;
        $cat->markaId = isset($request->markaId) ? $request->markaId : 0;
        $cat->fiyat = isset($request->fiyat) ? $request->fiyat : 0;
        $cat->onceki_fiyat = isset($request->onceki_fiyat) ? $request->onceki_fiyat : 0;
        $cat->bayi_fiyati = isset($request->bayi_fiyati) ? $request->bayi_fiyati : 0;
        $cat->urunkodu = isset($request->urunkodu) ? $request->urunkodu : 0;
        $cat->bagimlilik = isset($request->bagimlilik) ? $request->bagimlilik : 0;
        $cat->sure = isset($request->sure) ? $request->sure :  "0571-04-20 01:01:01";
        $cat->kargoucreti = isset($request->kargoucreti) ? $request->kargoucreti : 0;
        $cat->video_linki = isset($request->video_linki) ? $request->video_linki : "-";
        $cat->stok = isset($request->stok) ? $request->stok : 0;
        $cat->isActive = 1;
        $cat->sira = 0;
        $cat->save();



        foreach (getLangs() as $dil ) {

            $content = new Content();
            $content ->parent = "product";
            $content ->parentId = $cat->id;
            $content ->lang = $dil->kod;
            $content ->baslik = $request->input('baslik_'.$dil->kod);
            $content ->aciklama = $request->input('aciklama_'.$dil->kod);
            $content ->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
            $content ->dosya1 = $dosya1Path;
            $content ->dosya2 = $dosya2Path;
            $content ->dosya3 = $dosya3Path;

            $content ->save();

        }



        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }



    function update_form($id):View {

        $dildeger=array();

        $results = Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->where('contents.parentId', '=', $id)
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->get();



        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

        $icerik = Product::find($id);

        return view('admin.product.update' , compact( 'dildeger','id','icerik')  );
    }



    function update(Request $request,$id):RedirectResponse {

   
        $getIcerik = Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->get();

 
        $dosya1Path=$request->input('old_dosya1');
        $dosya2Path=$request->input('old_dosya2');
        $dosya3Path=$request->input('old_dosya3');

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




/*         $icerik = Product::find($id);
        $icerik->parentId = isset($request->category) ? $request->category : 0;
        $icerik->markaId  = isset($request->markaId) ? $request->markaId : 0;
        $icerik->save(); */

        /*

         $cat = new Product();
        $cat->parentId = isset($request->category) ? $request->category : 0;
        $cat->markaId = isset($request->markaId) ? $request->markaId : 0;
        $cat->fiyat = isset($request->fiyat) ? $request->fiyat : 0;
        $cat->onceki_fiyat = isset($request->onceki_fiyat) ? $request->onceki_fiyat : 0;
        $cat->bayi_fiyati = isset($request->bayi_fiyati) ? $request->bayi_fiyati : 0;
        $cat->urunkodu = isset($request->urunkodu) ? $request->urunkodu : 0;
        $cat->bagimlilik = isset($request->bagimlilik) ? $request->bagimlilik : 0;
        $cat->sure = isset($request->sure) ? $request->sure :  "0571-04-20 01:01:01";
        $cat->kargoucreti = isset($request->kargoucreti) ? $request->kargoucreti : 0;
        $cat->video_linki = isset($request->video_linki) ? $request->video_linki : "-";
        $cat->stok = isset($request->stok) ? $request->stok : 0;
        $cat->isActive = 1;
        $cat->sira = 0;
        $cat->save();




        */

        $icerik = Product::find($id);
        $icerik->parentId = isset($request->category) ? $request->category : 0;
        $icerik->markaId = isset($request->markaId) ? $request->markaId : 0;
        $icerik->fiyat = isset($request->fiyat) ? $request->fiyat : 0;
        $icerik->onceki_fiyat = isset($request->onceki_fiyat) ? $request->onceki_fiyat : 0;
        $icerik->bayi_fiyati = isset($request->bayi_fiyati) ? $request->bayi_fiyati : 0;
        $icerik->urunkodu = isset($request->urunkodu) ? $request->urunkodu : 0;
        $icerik->bagimlilik = isset($request->bagimlilik) ? $request->bagimlilik : 0;
        $icerik->sure = isset($request->sure) ? $request->sure :  "0571-04-20 01:01:01";
        $icerik->kargoucreti = isset($request->kargoucreti) ? $request->kargoucreti : 0;
        $icerik->video_linki = isset($request->video_linki) ? $request->video_linki : "-";
        $icerik->stok = isset($request->stok) ? $request->stok : 0;
        $icerik->save();

        


        foreach (getLangs() as $dil ) {

            $content = Content::where('parentId', $id)
                ->where('lang', $dil->kod)
                ->where('parent',  'product')
                ->first();


            if ($content) {

                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->aciklama = $request->input('aciklama_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content ->dosya1 = $dosya1Path;
                $content ->dosya2 = $dosya2Path;
                $content ->dosya3 = $dosya3Path;
                $content->save();


            } else {
                $content = new Content();
                $content->parent = "product";
                $content->parentId = $icerik->id;
                $content->lang = $dil->kod;
                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->aciklama = $request->input('aciklama_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content ->dosya1 = $dosya1Path;
                $content ->dosya2 = $dosya2Path;
                $content ->dosya3 = $dosya3Path;

                $content->save();
            }


        }

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }


    function remove($id):RedirectResponse  {

        $lang = Product::findOrFail($id);
        $lang->delete();

        Content::where('parent', 'category')
            ->where('parentId', $id)
            ->delete();

        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();

    }



    function ranksetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {


            $lang = Product::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }

    }

    function isActiveSetter(Request $request, $id) {

        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Product::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }




    /// image bölümü
    ///
    ///
            function image($id):View {

              $files = File::where('parent', 'product')
                  ->where('parentId', $id)
                  ->orderBy('sira', 'asc')
                  ->get();

              return view('admin.product.image', compact( 'id','files')  );

          }


    function imageIsActiveSetter(Request $request, $id,$parentId,$parent ) {
              // echo "--------- $id,$parentId,$parent ------------";
        $drm =  ($request->data === "true") ? 1 : 0;
             File::where('parentId', $parentId)
              ->where('id', $id)
              ->where('parent', $parent)
              ->update(['isActive' => $drm]);


    }


    function imageIsCoverSetter(Request $request, $id,$parentId) {

        File::where('id', $id)
            ->update(['isCover' => 1]);


        File::where('parentId', $parentId)
            ->where('id', '!=', $id)
            ->where('parent', "product")
            ->update(['isCover' => 0]);



        $files = File::where('parent', 'product')
            ->where('parentId', $parentId)
            ->orderBy('sira', 'asc')
            ->get();

        // echo "****** $id,$parentId*********";

      return view('admin.product.image_refresh_list',compact('files'));


    }



    function imageDelete($id):RedirectResponse {
        File::where('id', $id)->delete();
        File::where('id', $id)
            ->where('parent', 'product')
            ->delete();
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



    function refresh_image_list($id) {

        $files = File::where('parent', 'product')
            ->where('parentId', $id)
            ->where('parent', 'product')
            ->orderBy('sira', 'asc')
            ->get();

        return view('admin.product.image_refresh_list',compact('files'));


    }


    function file_upload(Request $request, $id)  {

        $dosya1Path = $this->uploadImage($request, 'file', "");
        $content = new File();
        $content ->type = "image";
        $content ->parent = "product";
        $content ->parentId = $id;
        $content ->url =$dosya1Path;
        $content ->sira =0;
        $content ->isActive =1;
        $content ->isCover =0;
        $content ->save();



    }






}
