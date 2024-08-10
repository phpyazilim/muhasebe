 

@extends('frontend.layouts.master')

@section('getTitle')  {{$urun->baslik}} @endsection

@section('getDescription')  {{$urun->baslik}}  @endsection

 
@section('getCss') 
 
@endsection

@section('getslideri')
    
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography border-radius-6px lg-border-radius-0px p-0" data-parallax-background-ratio="0.5" style="background-image: url({{asset('uploads/icheader.png')}});  ">
        <div class="opacity-extra-medium bg-blue-whale"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="m-auto text-white text-shadow-double-large fw-600 ls-minus-2px">   {{$urun->baslik}} </h1>
                </div>
                <div class="down-section text-center" data-anime='{ "translateY": [-50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <a href="#down-section" class="section-link">
                        <div class="text-white">
                            <i class="feather icon-feather-chevron-down icon-very-medium"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
@endsection



@section('content') 
  
          <!-- start section -->
          <section id='down-section'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 pe-5 order-2 order-lg-1 lg-pe-3 md-pe-15px" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="bg-solitude-blue border-radius-6px p-45px lg-p-30px mb-25px">
                            <span class="fs-19 alt-font text-dark-gray fw-700 mb-20px d-inline-block">Kategoriler</span>
                            <ul class="p-0 m-0 list-style-02 fw-500">

                                @foreach( getAllCategories() as $kategori)
                                <li class="pb-10px mb-10px border-bottom border-color-transparent-dark">
                                    <a href="{{route('front.urunler',['id' => $kategori->url ])}}"> {{$kategori->baslik }}  </a>
                                    <i class="feather icon-feather-arrow-right ms-auto"></i></li>
                                @endforeach

                           
                            </ul>
                        </div>
                        <div class="bg-dark-gray border-radius-6px ps-35px pb-25px pt-25px mb-25px">
                            <div class="feature-box feature-box-left-icon-middle">
                                <div class="feature-box-icon feature-box-icon-rounded w-65px h-65px lg-w-50px lg-h-50px me-20px lg-me-15px rounded-circle bg-base-color rounded-box">
                                    <i class="bi bi-telephone-outbound icon-extra-medium text-white"></i>
                                </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="lh-22 mb-10px d-block text-white opacity-6 fw-300">Bize Ulaşın</span>
                                    <span class="text-white fs-20 fw-500 lh-22 d-block"><a href="tel:{{config('site.firma_gsm')}} ">{{config('site.firma_gsm')}} </a></span>
                                </div>
                            </div>
                        </div>
                  
                    </div>
                
                
                    <div class="col-lg-8 order-1 order-lg-2 md-mb-50px"  >
                    
                         <!-- start section -->
      
                <div class="container  " >
                   
                    <div class="row mb-3">
                        <div class="col-12" data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="swiper slider-one-slide magic-cursor dark" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 25, "loop": true, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 30000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 1 }, "1200": { "slidesPerView": 1 }, "992": { "slidesPerView": 1 }, "768": { "slidesPerView": 1 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                                <div class="swiper-wrapper  ">
                               

                                    @foreach( $resim as $res)
                               
                                    <!-- start review item -->
                                    <div class="swiper-slide review-style-07"> 
                                        <div class="d-flex justify-content-center  flex-column border-radius-6px   bg-white box-shadow-extra-large ">
                                            <div class=" ">
                                                <img src="{{asset( $res)}}" class=" " alt="" style="height: 600px">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end review item -->
                              
                               
                                    
                                    @endforeach
                               
                                    
                               
                                
                                </div>  
                            </div>
                        </div>
                    </div>
                    
                </div>
      
            <!-- end section -->

 
 
                        <h4 class="text-dark-gray fw-700 alt-font mb-20px d-block"> {{$urun->baslik}}  </h4>
                        <p> {!! $urun->aciklama !!}      </p>
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
      
           
@endsection




@section('getJs') 
 
@endsection