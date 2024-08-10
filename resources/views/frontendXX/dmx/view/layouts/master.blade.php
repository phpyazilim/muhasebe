<!DOCTYPE html>
<html lang="zxx">
<head>
   
  
    @include('frontend.layouts.style')
    @yield('getCss')

</head>
<body>
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.header')

 
@yield('getslideri')
 

 
@yield('content')

@include('frontend.layouts.footer')


<!-- Latest compiled JavaScript -->
<script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"> </script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"> </script>
<script src="{{asset('frontend/assets/js/video_link.js')}}"></script>
<script src="{{asset('frontend/assets/js/video.js')}}"></script>
<script src="{{asset('frontend/assets/js/counter.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script src="{{asset('frontend/assets/js/animation_links.js')}}"></script>
<script src="{{asset('frontend/assets/js/animation.js')}}"></script>

<script src="{{asset('admin/lightbox/lightbox-plus-jquery.min.js')}}"></script> 


@yield('getJs')


</body>
</html>