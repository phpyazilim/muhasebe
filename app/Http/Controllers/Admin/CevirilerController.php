<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ceviriler;
use App\Models\Content;
use App\Models\Lang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CevirilerController extends Controller
{

    public function __construct()  {
        $this->middleware('checkUserPermission:translate');
      
     
   }


  

    function index():View { 
        $results = Ceviriler::join('contents', 'cevirilers.const', '=', 'contents.const_url')
            ->where('contents.parent', '=', 'translate')
            ->where('contents.lang', '=', 'tr')
            ->select('contents.*')
            ->get();



         return view('admin.translate.list', compact('results')  );

    }



    function add():View {
       // $diller = Lang::all()->sortBy('sira');

        return view('admin.translate.add'  );
    }



    function save(Request $request):RedirectResponse {

        $diller = Lang::all()->sortBy('sira');

        $const_deger = !empty($request->const_url) && strpos($request->const_url, '_') !== 0 ? makeUrl($request->const_url) : makeUrl($request->input('baslik_tr'));

        $ceviri = new Ceviriler();
        $ceviri->const = $const_deger;
        $ceviri->save();
        // $yeni_kayit_id = $ceviri->id;

        foreach ($diller as $dil ) {

             $icerik = new Content();
             $icerik ->parent = "translate";
             $icerik ->parentId = $ceviri->id;
             $icerik ->lang = $dil->kod;
             $icerik ->baslik = $request->input('baslik_'.$dil->kod);
             $icerik ->url = !empty($request->input('const_tr')) && strpos($request->input('const_tr'), '_') !== 0 ? makeUrl($request->input('const_tr' )) : makeUrl($request->input('baslik_tr'));
             $icerik ->const_url = $const_deger;
             $icerik ->save();

        }

        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();

    }


    function remove($id):RedirectResponse  {

//        try {
//            $lang = Ceviriler::findOrFail($id);
//            $deger = $lang->const;
//            $lang->delete();
//
//            Content::where('parent', 'translate')
//                ->where('url', $deger)
//                ->delete();
//
//            toastr()->success('Silme işlemi başarılı');
//            return redirect()->back();
//        } catch (ModelNotFoundException $exception) {
//            toastr()->error('Kayıt bulunamadı.');
//            Log::error($exception->getMessage());
//            return redirect()->back()->withErrors(['error' => 'Kayıt bulunamadı.']);
//        } catch (\Exception $exception) {
//            toastr()->error('Beklenmeyen bir hata oluştu.');
//            Log::error($exception->getMessage());
//            return redirect()->back()->withErrors(['error' => 'Beklenmeyen bir hata oluştu.']);
//        }




        $lang = Ceviriler::findOrFail($id);
        $deger =  $lang->const;
        $lang->delete();


        Content::where('parent', 'translate')
            ->where('url', $deger)
            ->delete();



       toastr()->success('Silme işlemi başarılı');
         return redirect()->back();


    }


    function update_form($id):View {
        $diller = Lang::all()->sortBy('sira');

        $results = Content::where('parent', 'translate')
            ->where('parentId', $id)
            ->get();

        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

        return view('admin.translate.update', compact('diller','dildeger','id')  );


    }




    function update(Request $request, $id): RedirectResponse {
        $diller = Lang::all()->sortBy('sira');

       // $ceviri = Ceviriler::findOrFail($id);
       // $const_deger = !empty($request->const) && strpos($request->const, '_') !== 0 ? makeUrl($request->const) : makeUrl($request->input('baslik_tr'));

       /// $ceviri->const = $const_deger;
      //   $ceviri->save();

        foreach ($diller as $dil) {
            $icerik = Content::where('parentId', $id)
                ->where('lang', $dil->kod)
                ->where('parent', 'translate')
                ->first();

            if ($icerik) {
                $icerik->baslik = $request->input('baslik_' . $dil->kod);
                $icerik ->url = !empty($request->input('const_tr' )) && strpos($request->input('const_tr'), '_') !== 0 ? makeUrl($request->input('const_tr' )) : makeUrl($request->input('baslik_tr'));
                $icerik->save();
            }
        }

        toastr()->success('Güncelleme işlemi başarılı');
        return redirect()->back();
    }






    }
