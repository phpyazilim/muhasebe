<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class FrontendController extends Controller
{
   
    
    function index():View {

        $haberler = getIcerikByIcerikParentId(2, "tr"); 
        $resimler =  getAllImageByArray("icerik" ,1 );
        $urunResimler =  getAllImageByArray("product" ,1 );
 
   
        return view('frontend.home' ,compact('resimler','haberler','urunResimler') );
    }
   
    
    function iletisim():View {
        return view('frontend.contact'  );
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
    
   
    function sayfa($id):View {

        $icerik=getIcerikByIcerikUrl($id);
         
        return view('frontend.sayfa' , compact('icerik' ) );

    }

 
    function haberler():View {
        
        $haberler = getIcerikByIcerikParentId(2, "tr"); 
        $resimler =  getAllImageByArray("icerik" ,1 );
        return view('frontend.haber',compact('resimler','haberler') );

    }

 
    function haberdetay($id):View {
 
        $haberler = getIcerikByIcerikParentId(2, "tr"); 

        $haber=  getIcerikByIcerikUrl($id );
 
        $resim=  getImage("icerik",$haber->parentId,0);
 

        return view('frontend.haberdetay',compact('resim','haber','haberler') );


    }


    
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
