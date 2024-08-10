
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="author" content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0" />

<title>@yield('getTitle') {{config('site.firma_title') }}  </title>
<meta name="description" content="@yield('getDescription')   {{config('site.firma_title') }} ">
<meta name="keywords" content="@yield('getKeywords')  {{config('site.firma_title') }}  ">
<!-- favicon icon -->
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<!-- google fonts preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- slider revolution CSS files -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/css/navigation.css')}}">
<!-- style sheets and font icons  -->
<link rel="stylesheet" href="{{asset('frontend/css/vendors.min.css')}}"/>
<link rel="stylesheet" href="{{asset('frontend/css/icon.min.css')}}"/>
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}"/>
<link rel="stylesheet" href="{{asset('frontend/demos/corporate/corporate.css')}}" />

{!!config('site.firma_analytics') !!}  