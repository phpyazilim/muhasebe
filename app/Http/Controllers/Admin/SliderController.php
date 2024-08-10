<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Icerik;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
 
use Auth;
 



class SliderController extends Controller {

    use FileUploadTrait;

    public function __construct()  { 
     
        $this->middleware('checkUserPermission:slider');
   }


    function index():View {
  
     
        return view("admin.slider.list"  );
   }


    function add():View  {
        return view("admin.slider.add");
    }


    function save(Request $request):RedirectResponse {
 
        $dosya1Path="";
        $dosya2Path="";

        if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1', '');
        }


        if ($request->has('dosya2')) {
            $dosya2Path = $this->uploadImage($request, 'dosya2', '');
        }

        $slider = new Slider();
        $slider->resim1 = $dosya1Path;
        $slider->resim2 = $dosya2Path;
        $slider->sira = 0;
        $slider->isActive = 1;
        $slider->save();


        foreach (getLangs() as $dil ) {

            $icerik = new Content();
            $icerik ->parent = "slider";
            $icerik ->parentId = $slider->id;
            $icerik ->lang = $dil->kod;
            $icerik ->baslik = $request->input('baslik_'.$dil->kod);
            $icerik ->baslik2 = $request->input('baslik2_'.$dil->kod);
            $icerik ->deger1 = $request->input('deger1_'.$dil->kod);  // 3. başlık
            $icerik ->deger2 = $request->input('deger2_'.$dil->kod); // buton
            $icerik ->link = $request->input('link_'.$dil->kod);
 
             $icerik ->save();

        }
        toastr()->success('Kayıt işlemi başarılı');
        return redirect()->back();
 
    }


    function ranksetter(Request $request) {

        $data = $request->data;
        parse_str($data,$order);
        $items=$order["ord"];

        foreach($items as $sira => $id) {


            $lang = Slider::findOrFail($id);
            $lang->sira =$sira;
            $lang->save();

        }



    }


    function isActiveSetter(Request $request, $id) {

        if($id) {
            $durum = ($request->data === "true") ? 1 : 0;
            $lang = Slider::findOrFail($id);
            $lang->isActive =$durum;
            $lang->save();
        }

    }


    function remove($id):RedirectResponse  {

        $lang = Slider::findOrFail($id);
        $lang->delete();

        Content::where('parent', 'slider')
            ->where('parentId', $id)
            ->delete();

        toastr()->success('Silme işlemi başarılı');
        return redirect()->back();

    }



    function update_form($id):View {

        $slider = Slider::find($id);
        $dildeger=array();

        $results = Slider::join('contents', 'sliders.id', '=', 'contents.parentId')
             ->where('contents.parent', '=', 'slider')
             ->where('contents.parentId', '=', $id)
             ->select('sliders.*', 'contents.*')
             ->orderBy('sliders.sira', 'asc')
             ->get();


        foreach($results as $dildgr) {
            $dildeger[$dildgr->lang]=$dildgr;
        }

     
        return view('admin.slider.update' , compact( 'dildeger','id','slider' )  );

    }



    function update(Request $request, $id):RedirectResponse  {

        $slider = Slider::findOrFail($id);

        $dosya1Path = $slider->resim1;
        $dosya2Path = $slider->resim2;

        if ($request->has('dosya1')) {
            $dosya1Path = $this->uploadImage($request, 'dosya1', $request->input('old_resim1'));
        }

        if ($request->has('dosya2')) {
            $dosya2Path = $this->uploadImage($request, 'dosya2',   $request->input('old_resim2'));
        }

        $slider->resim1 = $dosya1Path;
        $slider->resim2 = $dosya2Path;

        $slider->save();


        foreach (getLangs() as $dil ) {
        
             $icerik = Content::where('parentId', $slider->id)
                ->where('lang', $dil->kod)
                ->where('parent', "slider")
                ->first();
           

            $icerik->baslik = $request->input('baslik_'.$dil->kod);
            $icerik->baslik2 = $request->input('baslik2_'.$dil->kod);
            $icerik->deger1 = $request->input('deger1_'.$dil->kod);
            $icerik->deger2 = $request->input('deger2_'.$dil->kod);
            $icerik->link = $request->input('link_'.$dil->kod);
            $icerik->save(); 
            


        }
             toastr()->success('Güncelleme işlemi başarılı');
             return redirect()->back();


    }



    /*
      function insert(Request $request):RedirectResponse {
        // dd($request);

        $backgroundPath = $this->uploadImage( $request , 'background' ,$request->old_background  );
       // dd($backgroundPath);

        $data = $request->only(['title', 'sub_title', 'sale', 'link', 'seo' ]);  // güvenlik sağlar
        $data['background'] = $backgroundPath;

        Slider::create($data);
        toastr()->success('Güncelleme işlemi başarılı');
        return redirect()->back();

      }


      function destroy($id):RedirectResponse {

       //   dd($id);
         $slider = Slider::findOrFail($id);
         $slider->delete();
         toastr()->success('silme işlemi başarılı');
         return redirect()->back();

      }

      function edit($id):View  {
       $slider = Slider::findOrFail($id);
       return view("admin.slider.edit",compact('slider'));
      }

      // update içerisinde varsayılan request sınıfı kullanılabilr yada
      // ProfileControllerdeki gibi kendimiz bir request sınıfı oluşturabiliriz -- ProfileUpdateRequest
      function update( Request $request, $id) {
       $slider = Slider::findOrFail($id);

       $backgroundPath = $this->uploadImage( $request , 'background' ,$request->old_background  );
       $data = $request->only(['title', 'sub_title', 'sale', 'link', 'seo' ]);  // güvenlik sağlar
        $data['background'] = $backgroundPath;

      $slider->update($data);
       toastr()->success('güncelleme işlemi başarılı');
       return redirect()->back();

      }

      */
}
