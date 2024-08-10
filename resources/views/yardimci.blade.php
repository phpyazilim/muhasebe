 

{{config('site.firma_email')}}
{{config('site.firma_telefon')}}
{{config('site.firma_whatsap')}}
{{config('site.firma_adres')}}  
{{config('site.firma_adi')}}  
{{config('site.firma_gsm')}}  
{{config('site.firma_ustlogo')}}  
{{config('site.firma_altlogo')}}  
{{config('site.firma_harita')}}  
{{config('site.firma_analytics')}}  
{{config('site.firma_csskod')}}  
{{config('site.firma_jskod')}} 
 

{{config('site.firma_instagram')}}  
{{config('site.firma_facebook')}}  
{{config('site.firma_youtube')}}  
{{config('site.firma_twitter')}}  
{{config('site.firma_linkedin')}}  


{{config('site.firma_title')}}  
{{config('site.firma_description')}}  
{{config('site.firma_keyword')}}  
{{config('site.theme_color')}}  

 
---------- translate ----- 
{{  config('translate.anasayfa') }}

--------------


<?php

 $haberler = getAllIcerikByParentId(2, "tr"); 
 $resimler =  getAllImageByArray("icerik" ,1 ); // 2 olursa isCover gözardı edilir 
 $urunResimler =  getAllImageByArray("product" ,1 ); // 2 olursa isCover gözardı edilir 

 $haberler =  getAllIcerikByCategoryUrl($id); // Category urlye ait içerikleri çağırır
 $icerik=getIcerikByIcerikUrl($id);    //  urlsi verilen içeriği getirir


/// arama 
$aranan = $request->aranan;
$haberler  = aramaYap($aranan,"icerik",2); 

 
?>

 

@foreach($resimler as $resim)
<img alt="" src="{{asset($resim)}}" class="example-image">
@endforeach











 
