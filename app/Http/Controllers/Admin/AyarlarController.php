<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ayarlar;
use Illuminate\Http\RedirectResponse;
use App\Traits\FileUploadTrait;
use Symfony\Contracts\Service\Attribute\Required;


class AyarlarController extends Controller
{
    use FileUploadTrait;
    private $ayarlar;

    public function __construct()  {
     
        $this->middleware('checkUserPermission:ayarlar');
        $this->ayarlar = Ayarlar::all()->pluck('name', 'value');
    }


    
    function index() {
        //   dd(config('site._FIRMAGSM_'));
        // {{config('site._FIRMAGSM_')}}
    }




    function iletisim() :View {
        return view('admin.ayarlar.iletisim',['ayarlar' => $this->ayarlar]);
    }

     function analytics():View {
         return view('admin.ayarlar.analytics' ,['ayarlar' => $this->ayarlar]);
     }

    function logo():View {
        return view('admin.ayarlar.logo' ,['ayarlar' => $this->ayarlar] );
    }

    function harita() :View {
        return view('admin.ayarlar.harita' ,['ayarlar' => $this->ayarlar] );
    }

    function sosyal() :View {
        return view('admin.ayarlar.sosyal',['ayarlar' => $this->ayarlar]);
    }

    function seo() :View {
        return view('admin.ayarlar.seo',['ayarlar' => $this->ayarlar] );
    }

    function kod() :View {
        return view('admin.ayarlar.kod',['ayarlar' => $this->ayarlar] );
    }

    function tasarim() :View {
            checkUserYetki("tasarimayar");
            return view('admin.ayarlar.tasarim',['ayarlar' => $this->ayarlar] );
    }
 

    function update(Request $request) : RedirectResponse {

        $msg = "";
         if($request->input('gidenform') == "iletisim") {
             $veriler = request()->all();


              foreach ($veriler as $a => $b ) {
                  $kayit = Ayarlar::where('value', $a)->first();

                  if ($kayit) {
                      $kayit->name = $b;
                      $kayit->save();
                  }

              }




         } else if($request->input('gidenform') == "logo" ) {

             $ustLogoPath = $this->uploadImage( $request , 'ustlogo' ,$request->old_ustlogo);
             $altLogoPath = $this->uploadImage( $request , 'altlogo' ,$request->old_altlogo);

             $ustLogoUpdate  = Ayarlar::where('value', 'firma_ustlogo')->first();
             $ustLogoUpdate->name =!empty($ustLogoPath) ? $ustLogoPath : $request->old_ustlogo;

             $altLogoUpdate  = Ayarlar::where('value', 'firma_altlogo')->first();
             $altLogoUpdate->name =!empty($altLogoPath) ? $altLogoPath : $request->old_altlogo;

             $ustLogoUpdate->save();
             $altLogoUpdate->save();


             $msg = "Firma logosu başarıyla güncellendi";

         }  else if($request->input('gidenform') == "tasarim" ) {



             $slider_baslik_1 = 0;
             $slider_baslik_2 = 0;
             $slider_baslik_3 = 0;
             $slider_button = 0;
             $slider_ikinci_resim = 0;
             $slider_link = 0;


             $categories_resim_kullan = 0;
             $categories_alt_kategori = 0;
             $categories_kullan = 0;
             $urunlerde_marka_kullan = 0;
             $urunlerde_dosya3_kullan = 0;
             $urunlerde_dosya2_kullan = 0;
             $urunlerde_dosya1_kullan = 0;



             $urunlerde_fiyat_kullan = 0;
             $urunlerde_onceki_fiyat_kullan = 0;
             $urunlerde_bayi_fiyati = 0;
             $urunlerde_urunkodu = 0;
             $urunlerde_bagimlilik = 0;
             $urunlerde_sure = 0;
             $urunlerde_kargo_fiyati = 0;
             $urunlerde_video_linki = 0;
             $urunlerde_stok_miktari = 0;
             $urunlerde_yeni_urun = 0;
             $urunlerde_populer_urun = 0;
             $urunlerde_onecikar_urun = 0;

             if($request->input('slider_baslik_1')=="on") { $slider_baslik_1 = 1; }
             if($request->input('slider_baslik_2')=="on") { $slider_baslik_2 = 1; }
             if($request->input('slider_baslik_3')=="on") { $slider_baslik_3 = 1; }
             if($request->input('slider_button')=="on")   { $slider_button = 1; }
             if($request->input('slider_ikinci_resim')=="on") { $slider_ikinci_resim = 1; }
             if($request->input('slider_link')=="on") { $slider_link = 1; }
             if($request->input('categories_resim_kullan')=="on") { $categories_resim_kullan = 1; }
             if($request->input('categories_alt_kategori')=="on") { $categories_alt_kategori = 1; }
             if($request->input('categories_kullan')=="on") { $categories_kullan = 1; }
             if($request->input('urunlerde_marka_kullan')=="on") { $urunlerde_marka_kullan = 1; }
             if($request->input('urunlerde_dosya1_kullan')=="on") { $urunlerde_dosya1_kullan = 1; }
             if($request->input('urunlerde_dosya2_kullan')=="on") { $urunlerde_dosya2_kullan = 1; }
             if($request->input('urunlerde_dosya3_kullan')=="on") { $urunlerde_dosya3_kullan = 1; }

             if($request->input('urunlerde_fiyat_kullan')=="on") { $urunlerde_fiyat_kullan = 1; }
             if($request->input('urunlerde_onceki_fiyat_kullan')=="on") { $urunlerde_onceki_fiyat_kullan = 1; }
             if($request->input('urunlerde_bayi_fiyati')=="on") { $urunlerde_bayi_fiyati = 1; }
             if($request->input('urunlerde_urunkodu')=="on") { $urunlerde_urunkodu = 1; }
             if($request->input('urunlerde_bagimlilik')=="on") { $urunlerde_bagimlilik = 1; }
             if($request->input('urunlerde_sure')=="on") { $urunlerde_sure = 1; }
             if($request->input('urunlerde_kargo_fiyati')=="on") { $urunlerde_kargo_fiyati = 1; }
             if($request->input('urunlerde_video_linki')=="on") { $urunlerde_video_linki  = 1; }
             if($request->input('urunlerde_stok_miktari')=="on") { $urunlerde_stok_miktari = 1; }
             if($request->input('urunlerde_yeni_urun')=="on") { $urunlerde_yeni_urun = 1; }
             if($request->input('urunlerde_populer_urun')=="on") { $urunlerde_populer_urun = 1; }
             if($request->input('urunlerde_onecikar_urun')=="on") { $urunlerde_onecikar_urun = 1; }



             $kayit1 = Ayarlar::where('value',  'slider_baslik_1')->first();
             $kayit1->name = $slider_baslik_1;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'slider_baslik_2')->first();
             $kayit1->name = $slider_baslik_2;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'slider_baslik_3')->first();
             $kayit1->name = $slider_baslik_3;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'slider_button')->first();
             $kayit1->name = $slider_button;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'slider_ikinci_resim')->first();
             $kayit1->name = $slider_ikinci_resim;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'slider_link')->first();
             $kayit1->name = $slider_link;
             $kayit1->save();


             $kayit1 = Ayarlar::where('value',  'categories_kullan')->first();
             $kayit1->name = $categories_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'categories_alt_kategori')->first();
             $kayit1->name = $categories_alt_kategori;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'categories_resim_kullan')->first();
             $kayit1->name = $categories_resim_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_marka_kullan')->first();
             $kayit1->name = $urunlerde_marka_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_dosya1_kullan')->first();
             $kayit1->name = $urunlerde_dosya1_kullan;
             $kayit1->save();


             $kayit1 = Ayarlar::where('value',  'urunlerde_dosya2_kullan')->first();
             $kayit1->name = $urunlerde_dosya2_kullan;
             $kayit1->save();


             $kayit1 = Ayarlar::where('value',  'urunlerde_dosya3_kullan')->first();
             $kayit1->name = $urunlerde_dosya3_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_fiyat_kullan')->first();
             $kayit1->name = $urunlerde_fiyat_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_onceki_fiyat_kullan')->first();
             $kayit1->name = $urunlerde_onceki_fiyat_kullan;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_bayi_fiyati')->first();
             $kayit1->name = $urunlerde_bayi_fiyati;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_urunkodu')->first();
             $kayit1->name = $urunlerde_urunkodu;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_bagimlilik')->first();
             $kayit1->name = $urunlerde_bagimlilik;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_sure')->first();
             $kayit1->name = $urunlerde_sure;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_kargo_fiyati')->first();
             $kayit1->name = $urunlerde_kargo_fiyati;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_video_linki')->first();
             $kayit1->name = $urunlerde_video_linki;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_stok_miktari')->first();
             $kayit1->name = $urunlerde_stok_miktari;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_yeni_urun')->first();
             $kayit1->name = $urunlerde_yeni_urun;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_populer_urun')->first();
             $kayit1->name = $urunlerde_populer_urun;
             $kayit1->save();

             $kayit1 = Ayarlar::where('value',  'urunlerde_onecikar_urun')->first();
             $kayit1->name = $urunlerde_onecikar_urun;
             $kayit1->save();

              



             $msg = "Site ayarları başarıyla güncellendi";
         }



        toastr()->success($msg);
        return redirect()->back();


    }

}
