<?php

use App\Models\Lang;
use App\Models\Markalar;
use App\Models\Menu;
use App\Models\Icerik;
use App\Models\Content;
use App\Models\Slider;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use App\Models\Yetki;
use App\Models\File;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;


/***************** menü  ***************************/
// getAllMenu   -> tüm menüleri menu tablosundan çağırır
// getMenuByMenuId -> idi verilen menüyü çağırır tek kayıt gelir

/***************** slider  ***************************/
// getAllSlider  -> sliderleri çağır

/***************** diller  ***************************/
// getLangs     -> tüm dilleri çağırır

/***************** içerik ***************************/
// getAllIcerik -> tüm içerikleri çağırır
// getIcerikByIcerikId -> idi verilen içeriği getirir tek kayıt
// getIcerikByIcerikUrl -> urlsi verilen içeriği getirir
// getAllIcerikByParentId -> Bir menüye ait içerikleri çağırır
// getAllIcerikByParentIdByArray -> Bir menüye ait içerikleri içerik idine göre array olarak verir  
// getAllIcerikByCategoryId -> verilen kategoriye  ide ait içerikleri çağırır
// getAllIcerikByCategoryUrl -> verilen kategoriye  ide ait içerikleri çağırır
// oncekiveSonrakiKaydiBul($array, $knownKey) -> bloglarda önceki ve sonraki kayıt ürünler de olaablir verilen arrayda sonuç döner
//  kullanımı  $haberarr = getAllIcerikByParentIdByArray(2);  $haber=  getIcerikByIcerikUrl($id );  $kayit = oncekiveSonrakiKaydiBul($haberarr, $haber->parentId);    $oncekiKayit = $kayit['onceki'];  $sonrakiKayit =$kayit['sonraki'];


 
/***************** resim ***************************/
// getImage -> tek resim getirir
// getAllImage -> tüm resimleri çağırır -  isCover 2 ise isCoveri gözardı eder
// getAllImageByArray($parent="icerik" ,$isCover=0)  -> isCover 2 ise isCoveri gözardı eder -  $deger[ $image->parentId][] gibi sonuc döner 


/***************** ürünler  ***************************/
// getAllProducts -> tüm ürünleri çağır
// getAllProductsByCategoryId   ->  kategori idi verilen ürünleri getirir
// getProductByUrl  -> urlsi verilen ürünü getirir 

/***************** kategori ***************************/
// getCategoryByUrl    urlsi verilen tek kategoriyi getirir
// getAllCategories -> tüm kategorileri çağır


/***************** markalar ***************************/
// getAllMarkalar  -> tüm markaları çağır


/******************Çeviriler**************************** */
// getCeviriler // /tr gibi  url kontroluyle aktif dil çevirilerini getirir


/***********************kullanıcılar *************************** */
// getUsers($type) - $type =0   tümü   , 1 - kullanıcı , 2 - admin  


/*********************** yetkiler *************************** */
// getAllYetki - tüm yetkiler
// getYetkiById - idi verilen yetki 
// getAllYetkiByArray - yetkileri array olarak döndür 
//  isActiveUserYetki($yetki) - kullanıcının verilen yetkisininin olup olmadğını kontrol eder 
//  checkUserYetki($yetki) - yetkisiz kullanıcıyı 403 sayfasına yönlendir


/*************  arama **************** */
// aramaYap($aranan,$parent="icerik",$parentId=0) - başlık ve açıklama ara - $parent="icerik ,product, $parentId içerikler id girilmeli mesela haberler gibi






if (!function_exists('getAllMenu')) {
  
     /** 
     * @param string $text
     * @return string
     */

    function getAllMenu($lang="tr")
    {
        $results = Menu::join('contents', 'menus.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'menu')
            ->where('contents.lang', '=', $lang)
            ->select('contents.*')
            ->get();
        return $results;
    }
}

if (!function_exists('getLangs')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getLangs()
    {
       // $results = Lang::all()->sortBy('sira');
       $results = Lang::where('isActive', 1)->orderBy('sira')->get();

        return $results;
    }



}



if (!function_exists('getAllIcerik')) {
    /**
     * @param string $text
     * @return string
     */

    function getAllIcerik($lang="tr")
    {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.isActive', '=', 1)
            ->select('iceriks.*', 'contents.*')
            //  ->select('iceriks.isActive', 'iceriks.category', 'contents.*') belli sutunları seçmek için
            ->orderBy('iceriks.sira', 'asc')
            ->get();

        return $results;
    }
}



if (!function_exists('getAllIcerikByParentId')) {
   

    /**
     * 
     * @param string $text
     * @return string
     */

    function getAllIcerikByParentId($icerikParentId, $lang="tr")
    {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('iceriks.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.parentId', '=', $icerikParentId)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();

        return $results;
    }
}



if (!function_exists('getAllIcerikByParentIdByArray')) {
    /**
     * 
     * @param string $text
     * @return string
     */

    function getAllIcerikByParentIdByArray($icerikParentId, $lang="tr")  {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('iceriks.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.parentId', '=', $icerikParentId)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();

            $deger = array();

            foreach ($results as $key ) {
                $deger[ $key->parentId][]  = $key;
            }
    
            return $deger;

    }
}


if (!function_exists('getAllIcerikByCategoryId')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllIcerikByCategoryId($icerikCategoryId, $lang="tr")
    {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('iceriks.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.category', '=', $icerikCategoryId)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();

        return $results;
    }
}


if (!function_exists('getAllIcerikByCategoryUrl')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllIcerikByCategoryUrl($icerikCategoryUrl, $lang="tr")
    {

       
        $cat = getIcerikByIcerikUrl($icerikCategoryUrl, $lang);

 
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('iceriks.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.category', '=', $cat->parentId )
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get();

          

        return $results;

    }
}


if (!function_exists('getMenuByMenuId')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getMenuByMenuId($getMenuByMenuId, $lang="tr")
    {
        $results = Menu::join('contents', 'menus.id', '=', 'contents.parentId')
            ->where('contents.lang', '=', $lang)
            ->where('contents.parent', '=', 'menu')
            ->where('contents.parentId', '=', $getMenuByMenuId)
            ->select('contents.*')
            ->first();

        return $results;
    }
}



if (!function_exists('getAllSlider')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllSlider( $lang="tr")
    {
        $results =  Slider::join('contents', 'sliders.id', '=', 'contents.parentId')
            ->where('contents.lang', '=', $lang)
            ->where('contents.parent', '=', 'slider')
            ->where('sliders.isActive', '=', 1)
            ->select('contents.*','sliders.*')
            ->orderBy('sira', 'asc')
            ->get();

        return $results;
    }
}


if (!function_exists('getAllCategories')) {

    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllCategories(  $lang="tr")
    {
        $results =  Categories::join('contents', 'categories.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'category')
            ->where('contents.lang', '=', $lang)
            ->where('categories.isActive', '=', 1)
            ->select('categories.*', 'contents.*')
            ->orderBy('categories.sira', 'asc')
            ->get();

        return $results;
    }
}

if (!function_exists('getAllProducts')) {

    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllProducts(  $lang="tr")
    {
        $results =  Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->where('products.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->get();

        return $results;
    }
}



if (!function_exists('getAllMarkalar')) {

    /**
     *
     * @param string $text
     * @return string
     */

    function getAllMarkalar( )
    {
        $results = Markalar::where('isActive', 1)->orderBy('sira')->get();

        return  $results;
    }
}




if (!function_exists('getIcerikByIcerikId')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getIcerikByIcerikId($icerikId, $lang="tr")
    {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.lang', '=', $lang)
            ->where('iceriks.id', '=', $icerikId)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->first();

        return $results;
    }
}

if (!function_exists('getIcerikByIcerikUrl')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getIcerikByIcerikUrl($icerikUrl, $lang="tr")
    {
        $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.lang', '=', $lang)
            ->where('contents.url', '=', $icerikUrl)
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->first();

        return $results;
    }
}




if (!function_exists('getImage')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getImage($parent="icerik",$parentId=0,$isCover=0)
    {

        $files = File::where('parent', $parent)
            ->where('isCover', $isCover)
            ->where('parentId', $parentId)
            ->first();

        return $files;
    }
}


if (!function_exists('getAllImage')) {
    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllImage($parent="icerik",$parentId=0 ,$isCover=0)
    {

        if( $isCover != 2 ) {
        $files = File::where('parent', $parent)
           ->where('isActive', '=', 1)
            ->where('isCover', $isCover)
            ->where('parentId', $parentId)
            ->orderBy('sira', 'asc')
            ->get();

        } else {
            $files = File::where('parent', $parent)
            ->where('isActive', '=', 1) 
             ->where('parentId', $parentId)
             ->orderBy('sira', 'asc')
             ->get();

         } 

        return $files;
    }
}

if (!function_exists('getAllImageByArray')) {
    /**
     * 
     * @param string $text
     * @return string
     */

    function getAllImageByArray($parent="icerik" ,$isCover=0) {

     if( $isCover != 2 ) {
        $files = File::where('parent', $parent)
            ->where('isActive', '=', 1)
            ->where('isCover', $isCover)
            ->orderBy('sira', 'asc')
            ->get();
     } else {
        $files = File::where('parent', $parent)
            ->where('isActive', '=', 1)
            ->orderBy('sira', 'asc')
            ->get();
     }
 
        $deger = array();
 
        foreach ($files as $key => $image) {
            $deger[ $image->parentId][]  = $image->url;
        }

        return $deger;
    }
}







if (!function_exists('getCategoryByUrl')) {

    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getCategoryByUrl( $url, $lang="tr")
    {
        $results =  Categories::join('contents', 'categories.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'category')
            ->where('contents.lang', '=', $lang)
            ->where('contents.url', '=', $url)
            ->select('categories.*', 'contents.*')
            ->orderBy('categories.sira', 'asc')
            ->first();

        return $results;
    }
}




if (!function_exists('getAllProductsByCategoryId')) {

    /**
     *
     *
     * @param string $text
     * @return string
     */

    function getAllProductsByCategoryId($categoryId,  $lang="tr")
    {
        $results =  Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->where('products.isActive', '=', 1)
            ->where('products.parentId', '=', $categoryId)
            ->where('contents.lang', '=', $lang)
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->get();
        //  ->toSql();

        return $results;
    }
}



if (!function_exists('getProductByUrl')) {

    /**
     *  
     *
     * @param string $text
     * @return string
     */

    function getProductByUrl($url,  $lang="tr")
    {
        $results =  Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->where('products.isActive', '=', 1)
            ->where('contents.lang', '=', $lang)
            ->where('contents.url', '=', $url,)
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->first();

        return $results;
    }
}


if (!function_exists('getCeviriler')) {

    /** 
     * @param string $text
     * @return string
     */

    function getCeviriler( $lang)
    {
  
       
      $ceviriler = Content::where('parent', 'translate')
            ->where('lang', $lang)
            ->get(['baslik', 'url']);

        return $ceviriler;  

       
 
    }
}




if (!function_exists('getUsers')) {

    /** 
     * @param string $text
     * @return string
     */

    function getUsers( $type=0 )
    {
  
        switch ($type) {
            case 1: 
                $users = User::where('user_type', 'user')->get();
                break;
            case 2: 
                $users = User::where('user_type', 'admin')->get();
                break;
            default: 
                $users = User::all();
                break;
        }
      

        return $users;  

       
 
    }
}



if (!function_exists('getAllYetki')) {

    /** 
     * @param string $text
     * @return string
     */

    function getAllYetki()  {
   
        $yetkiler = Yetki::all();

        return $yetkiler;
 
    }
}


if (!function_exists('getAllYetkiByArray')) {

    /** 
     * @param string $text
     * @return string
     */

    function getAllYetkiByArray()  {
   
        $yetkiler = Yetki::all();
 
        $deger = array();


        foreach ($yetkiler as $key => $value) {
            $deger[ $value->id]  = $value;
        }

        return $deger;


 
    }
}



if (!function_exists('getYetkiById')) {

    /** 
     * @param string $text
     * @return string
     */

    function getYetkiById($id)  {
   
        $yetkiler = Yetki::find($id);

        return $yetkiler;


 
    }
} 



if (!function_exists('isActiveUserYetki')) {

    /** 
     * @param string $text
     * @return string
     */

    function isActiveUserYetki($yetki)  {
   
         
 
        $userPermissions = getYetkiById(Auth()->user()->yetki_id)->permissions; 
        $permissionsArray = json_decode($userPermissions, true);
 
       if(isset($yetki) && isset($permissionsArray)   ) {
        if (array_key_exists($yetki, $permissionsArray)) {
            return true;
        } else {
            return false;
        }

        }
 
    }
} 






if (!function_exists('checkUserYetki')) {

    /** 
     * @param string $text
     * @return string
     */

    function checkUserYetki($yetki)  {  

   
   
       if(!isActiveUserYetki($yetki)) {
            abort(403, 'Bu işlemi yapmaya yetkiniz yok.');
        }  
 

    }
} 


if (!function_exists('aramaYap')) {

    /** 
     * @param string $text
     * @return string
     */

    function aramaYap($aranan,$parent="icerik",$parentId=0 )  {  

   
        if($parent=="icerik") {
           
            $items = $results = Icerik::join('contents', 'iceriks.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'icerik')
            ->where('contents.lang', '=', 'tr')
            ->where('iceriks.parentId', '=', $parentId)
            ->where(function ($query) use ($aranan) {
                $query->where('contents.baslik', 'like', '%' . $aranan . '%')
                    ->orWhere('contents.aciklama', 'like', '%' . $aranan . '%');
            })
            ->select('iceriks.*', 'contents.*')
            ->orderBy('iceriks.sira', 'asc')
            ->get(); 


        } else if($parent=="product") {

            $items = $results = Product::join('contents', 'products.id', '=', 'contents.parentId')
            ->where('contents.parent', '=', 'product')
            ->where('contents.lang', '=', 'tr')
            ->where(function ($query) use ($aranan) {
                $query->where('contents.baslik', 'like', '%' . $aranan . '%')
                    ->orWhere('contents.aciklama', 'like', '%' . $aranan . '%');
            })
            ->select('products.*', 'contents.*')
            ->orderBy('products.sira', 'asc')
            ->get(); 

         } 
       
       return $items;
    
 

    }
} 







if (!function_exists('oncekiveSonrakiKaydiBul')) {

    /** 
     * @param string $text
     * @return string
     */


function oncekiveSonrakiKaydiBul($array, $knownKey) {
    $keys = array_keys($array); // Tüm key'leri al

    $currentIndex = array_search($knownKey, $keys); // Bilinen key'in index'ini bul
    if ($currentIndex === false) {
        return ["Önceki key" => null, "Sonraki key" => null];
    } else {
        // Önceki key'i bulma
        $prevKey = isset($keys[$currentIndex - 1]) ? $array[$keys[$currentIndex - 1]][0] : null;

         // Sonraki key'i bulma
        $nextKey = isset($keys[$currentIndex + 1]) ?   $array[$keys[$currentIndex + 1]][0] : null;

        return ["onceki" => $prevKey, "sonraki" => $nextKey];
    }

    /*
       kullanım
       kayıt yoksa null döner
       $kayit = oncekiveSonrakiKaydiBul($haberarr, $haber->parentId);
        $oncekiKayit = $kayit['onceki'];
        $sonrakiKayit =$kayit['sonraki'];
  blade 
  {{ isset($oncekiKayit->url) ? route("front.blogdetay", ['id' => $oncekiKayit->url]) : '#' }}


    */
}

}


 

?>
