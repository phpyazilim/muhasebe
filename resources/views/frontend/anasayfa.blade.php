<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', \App::getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>   </title>
</head>
<body>
     

    {{ __('routes.iletisim') }}

 Mevcut Dil: {{ app()->getLocale() }}  

  
 
<br>
 
**************************

<br>


 {{ config('site.firma_harita')  }}
 
 ////////////////

 {{  config('translate.anasayfa') }}

///////////// 

<br>

<a href="{{ localized_route('iletisim') }}">{{ __('İletişim') }}</a>
      
<a href="{{ localized_route('urunler', ['slug' => 'kategori1']) }}">{{ __('Ürünler - Kategori 1') }}</a>
 
@include('admin.layouts.cerez')
 

</body>
</html>







