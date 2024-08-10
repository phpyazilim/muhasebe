<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Basvuru;
use App\Traits\FileUploadTrait;



class FrontendController extends Controller
{
    use FileUploadTrait;
    
    function index():View {

        $haberler = getAllIcerikByParentId(2, "tr"); 
        $resimler =  getAllImageByArray("icerik" ,1 );
        $urunResimler =  getAllImageByArray("product" ,1 );
 
   
        return view('frontend.anasayfa' ,compact('resimler','haberler','urunResimler') );
    }
   


    function icerik($id):View {

        $icerik=getIcerikByIcerikUrl($id);
       
        $images = getAllImage("icerik",$icerik->parentId, 0);

        $resim1 = "";
        $resim2 = "";
       
        foreach ($images as $key => $image) {
            if ($key == 0) {
                $resim1 = $image->url;  
            } elseif ($key == 1) {
                $resim2 = $image->url; 
            }
        }
 
        return view('frontend.kurumsal' , compact('icerik','resim1','resim2') );

    }




    function iletisim():View {
        return view('frontend.contact'  );
    }
    

    function referans():View {

        $images = getAllImage("icerik",4, 0);

       
        return view('frontend.referans', compact('images')   ); 
    }


    
  
    function haberler():View {
        
        $haberler = getAllIcerikByParentId(2, "tr"); 
        $resimler =  getAllImageByArray("icerik" ,1 );
        return view('frontend.haber',compact('resimler','haberler') );

    }
    
  
    function blogkategori($id):View {
        
        $haberler =  getAllIcerikByCategoryUrl($id);
      
        $resimler =  getAllImageByArray("icerik" ,1 );
        return view('frontend.haber',compact('resimler','haberler') );

    }
   

    function haberara(Request $request):View {
        
   

       $aranan = $request->aranan;
       $haberler  = aramaYap($aranan,"icerik",2); 
  

        $resimler =  getAllImageByArray("icerik" ,1 );
        return view('frontend.haber',compact('resimler','haberler') );

    }
    


    function haberdetay($id):View {
 
        $haberler = getAllIcerikByParentId(2, "tr"); 

        $haberarr = getAllIcerikByParentIdByArray(2);
 
        $haber=  getIcerikByIcerikUrl($id );
        
        $kayit = oncekiveSonrakiKaydiBul($haberarr, $haber->parentId);
        $oncekiKayit = $kayit['onceki'];
        $sonrakiKayit =$kayit['sonraki'];
 


        $resimler =  getAllImageByArray("icerik" ,1 );
        $resim=  getImage("icerik",$haber->parentId,0);

      
        return view('frontend.haberdetay',compact('resim','haber','haberler','resimler','haberarr','oncekiKayit','sonrakiKayit') );


    }



    function resimgaleri():View {

        $resimler_=  getAllImageByArray("icerik" ,0);
        $resimler =  $resimler_[12];
        return view('frontend.resimgaleri' , compact('resimler' ) );

    }


    function videogaleri():View {

        $icerik=getAllIcerikByParentId(6);
        
        return view('frontend.videogaleri' , compact('icerik' ) );

    }


      
    function basvurustep1():View {
        return view('frontend.basvurustep1'  );
    }

      
    function basvurustep2(Request $request):View {

 
    $formData = [
        'tabelaAdi' => $request->input('tabelaAdi'),
        'kurulusTarihi' => $request->input('kurulusTarihi'),
        'ortaklikYapisi' => $request->input('ortaklikYapisi'),
        'yetkiliKisiIsim' => $request->input('yetkiliKisiIsim'),
        'yetkiliKisiTcNo' => $request->input('yetkiliKisiTcNo'),
        'yetkiliKisiEposta' => $request->input('yetkiliKisiEposta'),
        'yetkiliKisiTelefon' => $request->input('yetkiliKisiTelefon'),
        'isyeriTelefon' => $request->input('isyeriTelefon'),
        'sehir' => $request->input('sehir'),
        'websitesi' => $request->input('websitesi'),
        'faaliyetAlani' => $request->input('faaliyetAlani'),
        'aylikCiro' => $request->input('aylikCiro'),
        'talepEdilenOdemeYontemi' => $request->input('talepEdilenOdemeYontemi'),
    ];

          $ortaklikYapisi = $request->input('ortaklikYapisi');
        
        return view('frontend.basvurustep2' , compact('formData','ortaklikYapisi') );
    }

    

    function basvurusave(Request $request)  {

        $tabelaAdi = $request->input('tabelaAdi');
        $kurulusTarihi = $request->input('kurulusTarihi');
        $ortaklikYapisi = $request->input('ortaklikYapisi');
        $yetkiliKisiIsim = $request->input('yetkiliKisiIsim');
        $yetkiliKisiTcNo = $request->input('yetkiliKisiTcNo');
        $yetkiliKisiEposta = $request->input('yetkiliKisiEposta');
        $yetkiliKisiTelefon = $request->input('yetkiliKisiTelefon');
        $isyeriTelefon = $request->input('isyeriTelefon');
        $sehir = $request->input('sehir');
        $websitesi = $request->input('websitesi');
        $faaliyetAlani = $request->input('faaliyetAlani');
        $aylikCiro = $request->input('aylikCiro');
        $talepEdilenOdemeYontemi = $request->input('talepEdilenOdemeYontemi');


        $item1 = "";
        $item1 .="Tabela Adı : $tabelaAdi <br>";
        $item1 .="Kuruluş Tarihi : $kurulusTarihi  <br> ";
        $item1 .="Ortaklık Yapısı : $ortaklikYapisi  <br>";
        $item1 .="Yetkili Kişi İsim : $yetkiliKisiIsim  <br> ";
        $item1 .="Yetkili Kişi Tc No : $yetkiliKisiTcNo  <br>";
        $item1 .="Yetkili Kişi E-Posta : $yetkiliKisiEposta  <br>";
        $item1 .="Yetkili Kişi Telefon : $yetkiliKisiTelefon  <br>";
        $item1 .="İş Yeri Telefon : $isyeriTelefon  <br>";
        $item1 .="Şehir :  $sehir  <br>";
        $item1 .="Web Sitesi : $websitesi  <br>";
        $item1 .="Faaliyet Alanı :$faaliyetAlani   <br>";
        $item1 .="Aylık Ciro :$aylikCiro   <br>";
        $item1 .="Talep Edilen Ödeme Yöntemi :$talepEdilenOdemeYontemi  <br> ";
        $item1 .="<hr>";


        if ($request->has('imzaSirkuleri')) {
            $imzaSirkuleriPath = $this->uploadImage($request, 'imzaSirkuleri', '', '/uploads/basvuru');
            $item1 .="İmza Sirkuleri :".asset($imzaSirkuleriPath)."<br>";
        }

        
        if ($request->has('dernekStatuBelgesi')) {
            $dernekStatuBelgesiPath = $this->uploadImage($request, 'dernekStatuBelgesi', '', '/uploads/basvuru');
            $item1 .="Kamu ve devlet yararına çalışan dernek statüsü belgesi :".asset($dernekStatuBelgesiPath)."<br>";;
        }
        
        if ($request->has('dernekKutukKayitBilgileri')) {
            $dernekKutukKayitBilgileriPath = $this->uploadImage($request, 'dernekKutukKayitBilgileri', '', '/uploads/basvuru');
            $item1 .="Dernek Kütüğü Kayıt Bilgileri :".asset($dernekKutukKayitBilgileriPath)."<br>";
        }

        
        
        if ($request->has('telFaksMailWebBilgileri')) {
            $telFaksMailWebBilgileriPath = $this->uploadImage($request, 'telFaksMailWebBilgileri', '', '/uploads/basvuru');
            $item1 .="Telefon No varsa faks, E-posta ve web sitesi bilgileri :".asset($telFaksMailWebBilgileriPath)."<br>";
        }

        
        
        if ($request->has('noterOnayliDernakKararDefteri')) {
            $noterOnayliDernakKararDefteriPath = $this->uploadImage($request, 'noterOnayliDernakKararDefteri', '', '/uploads/basvuru');
            $item1 .="Temsile Yetkili Kişileri Gösteren Noter Onaylı Dernek Karar Defteri :".asset($noterOnayliDernakKararDefteriPath)."<br>";
        }

        
        
        if ($request->has('tcKimlikBelgeleri')) {
            $tcKimlikBelgeleriPath = $this->uploadImage($request, 'tcKimlikBelgeleri', '', '/uploads/basvuru');
            $item1 .="Temsile Yetkili Kişilerin TC Kimlik Belgesi :".asset($tcKimlikBelgeleriPath)."<br>";
        }

        
        
        if ($request->has('imzaOrnekleri')) {
            $imzaOrnekleriPath = $this->uploadImage($request, 'imzaOrnekleri', '', '/uploads/basvuru');
            $item1 .="İmza Örnekleri :".asset($dernekStatuBelgesiPath)."<br>";
        }

        
        
        if ($request->has('ticaretSicilGazete')) {
            $ticaretSicilGazetePath = $this->uploadImage($request, 'ticaretSicilGazete', '', '/uploads/basvuru');
            $item1 .="Ticaret Sicil Gazetesi  :".asset($ticaretSicilGazetePath)."<br>";
        }

        
        
        if ($request->has('vergiLevhasi')) {
            $vergiLevhasiPath = $this->uploadImage($request, 'vergiLevhasi', '', '/uploads/basvuru');
            $item1 .="Vergi Levhası :".asset($vergiLevhasiPath)."<br>";
        }

        
        
        if ($request->has('kimlikFotokopisi')) {
            $kimlikFotokopisiPath = $this->uploadImage($request, 'kimlikFotokopisi', '', '/uploads/basvuru');
            $item1 .="Ortakların Kimlik Ön ve Arka Kimlik Görüntüleri :".asset($kimlikFotokopisiPath)."<br>";
        }

        
        
        if ($request->has('yerlesimYeriBelgesi')) {
            $yerlesimYeriBelgesiPath = $this->uploadImage($request, 'yerlesimYeriBelgesi', '', '/uploads/basvuru');
            $item1 .="Ortakların kişinin Yerleşim Yeri Belgesi (Son 1 aya ait e-devlet) :".asset($yerlesimYeriBelgesiPath)."<br>";
        }

        
        
        if ($request->has('kimlikFotokopisiSahis')) {
            $kimlikFotokopisiSahisPath = $this->uploadImage($request, 'kimlikFotokopisiSahis', '', '/uploads/basvuru');
            $item1 .="İmzaya Yetkili Kişinin Ön ve Arka Yüz Kimlik Fotokopisi  :".asset($kimlikFotokopisiSahisPath)."<br>";
        }

        
        
        if ($request->has('imzaBeyanname')) {
            $imzaBeyannamePath = $this->uploadImage($request, 'imzaBeyanname', '', '/uploads/basvuru');
            $item1 .="İmza Beyannamesi :".asset($imzaBeyannamePath)."<br>";
        }

        
        
        if ($request->has('yerlesimYeriBelgesiSahis')) {
            $yerlesimYeriBelgesiSahisPath = $this->uploadImage($request, 'yerlesimYeriBelgesiSahis', '', '/uploads/basvuru');
            $item1 .="Yetkili kişinin Yerleşim Yeri Belgesi (Son 1 aya ait e-devlet) :".asset($yerlesimYeriBelgesiSahisPath)."<br>";
        }

        
        
        $marka = new Basvuru();
        $marka->item = $item1;
 
        $marka->save();
 
        return redirect()->route('front.basvurusonuc');
        
    }





    function basvurusonuc( ):View {
        return view('frontend.basvurusonuc'  ); 
    }


    function paketler( ):View {

        $paket_ = getIcerikByIcerikId(19);
        $paket = $paket_->aciklama;
  
        return view('frontend.paketler' ,compact('paket') ); 
    }


    
   






//////////////////////////////////////////////////////////////////

   

    
   



 
 


    
    function kategori():View {
        return view('frontend.kategori'  );
    }
    



    function urunler($id):View {

      $kategori = getCategoryByUrl($id);
 
      $urunler = getAllProductsByCategoryId($kategori->parentId);
      
  
      $resimler =  getAllImageByArray("product" ,1);
    
        return view('frontend.urunler' , compact('urunler','kategori','resimler') ); 

    }
    


    function search(Request $request):View {

        $aranan = $request->aranan;
       
      $urunler = $results = Product::join('contents', 'products.id', '=', 'contents.parentId')
      ->where('contents.parent', '=', 'product')
      ->where('contents.lang', '=', 'tr')
      ->where(function ($query) use ($aranan) {
          $query->where('contents.baslik', 'like', '%' . $aranan . '%')
              ->orWhere('contents.aciklama', 'like', '%' . $aranan . '%');
      })
      ->select('products.*', 'contents.*')
      ->orderBy('products.sira', 'asc')
      ->get();
  
      $resimler =  getAllImageByArray("product" ,1);
 
        return view('frontend.search' , compact('urunler' ,'resimler') ); 

    }



    function urundetay($id):View {


        $urun = getProductByUrl($id);
        $resimler =  getAllImageByArrayb("product");
        $resim = $resimler[$urun->parentId];
        $getResim = $resim[0];
 

        return view('frontend.urundetay' , compact('urun','getResim','resim') ); 

    }


    public function seo(  $slug1, $slug2) {


        $sehir_ =  json_decode( getSehir($slug2), true);
        $kelime_ =  json_decode( getKelime($slug1), true);
         $sehir = $sehir_["adi"];
         $kelime = $kelime_["baslik"];

       

         $haberler = getIcerikByIcerikParentId(2, "tr"); 
         $resimler =  getAllImageByArray("icerik" ,1 );
         $urunResimler =  getAllImageByArray("product" ,1 );
    
         return view('frontend.home' ,compact('resimler','haberler','urunResimler','sehir','kelime') );
  
  
    }


    

}
