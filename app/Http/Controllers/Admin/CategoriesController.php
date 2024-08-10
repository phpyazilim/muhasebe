<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Content;
use App\Models\Icerik;
use App\Models\Menu;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller {

    use FileUploadTrait;


    public function __construct()  {
        $this->middleware('checkUserPermission:kategoriler');
      
     
   }



    function index():View {
      return view('admin.categories.list'  );

    }



    function add():View {

        return view('admin.categories.add' );
    }


    function save(Request $request):RedirectResponse {
        $dosya1Path="";
        if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1',  "");
            echo "dosya1 var ";
        }

        $cat = new Categories();
        $cat->parentId = isset($request->category) ? $request->category : 0;
        $cat->isActive = 1;
        $cat->sira = 0;
        $cat->save();

        foreach (getLangs() as $dil ) {


            $content = new Content();
            $content ->parent = "category";
            $content ->parentId = $cat->id;
            $content ->lang = $dil->kod;
            $content ->baslik = $request->input('baslik_'.$dil->kod);
            $content ->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
            $content ->dosya1 = $dosya1Path;


            $content ->save();

        }

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }





    function update_form($id):View {

        $dildeger=array();

        $results = Categories::join('contents', 'categories.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'category')
            ->where('contents.parentId', '=', $id)
            ->select('categories.*', 'contents.*')
            ->orderBy('categories.sira', 'asc')
            ->get();



        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

        $icerik = Categories::find($id);

        return view('admin.categories.update' , compact( 'dildeger','id','icerik')  );
    }



    function update(Request $request,$id):RedirectResponse {


        $getIcerik = Categories::join('contents', 'categories.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'category')
            ->select('categories.*', 'contents.*')
            ->orderBy('categories.sira', 'asc')
            ->get();


          $dosya1Path=$request->old_dosya1;



        if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1', $request->old_dosya1);
            echo "dosya1 var ";
        }



        $icerik = Categories::find($id);
        $icerik->category = isset($request->category) ? $request->category : 0;



        foreach (getLangs() as $dil ) {

            $content = Content::where('parentId', $id)
                ->where('lang', $dil->kod)
                ->where('parent',  'category')
                ->first();


            if ($content) {

                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content->dosya1 = $dosya1Path;
                $content->save();


            } else {
                $content = new Content();
                $content->parent = "category";
                $content->parentId = $icerik->id;
                $content->lang = $dil->kod;
                $content->baslik = $request->input('baslik_'.$dil->kod);
                $content->url = !empty($request->input('const_'.$dil->kod)) && strpos($request->input('const_'.$dil->kod), '_') !== 0 ? makeUrl($request->input('const_'.$dil->kod)) : makeUrl($request->input('baslik_'.$dil->kod));
                $content->dosya1 = $dosya1Path;

                $content->save();
            }


        }

        toastr()->success('Kayıt işlemi başarılı');
   return redirect()->back();

    }



    function remove($id):RedirectResponse  {

        $lang = Categories::findOrFail($id);
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


            $lang = Categories::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }



    }




    function isActiveSetter(Request $request, $id) {

        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Categories::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }






}
