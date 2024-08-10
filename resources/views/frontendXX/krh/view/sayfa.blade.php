


@extends('frontend.layouts.master')

@section('getTitle') {{$icerik->baslik}}  @endsection

@section('getDescription') {{$icerik->baslik}}   @endsection

 
@section('getCss') 
 
@endsection

@section('getslideri')
    
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography border-radius-6px lg-border-radius-0px p-0" data-parallax-background-ratio="0.5"  style="background-image: url({{asset('uploads/icheader.png')}});  ">
        <div class="opacity-extra-medium bg-blue-whale"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="m-auto text-white text-shadow-double-large fw-600 ls-minus-2px"> {{$icerik->baslik}} </h1>
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
        <section class="py-0 sm-pt-50px" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <div class="container overlap-section">
                <div class="row justify-content-center g-0">
                    <div class="col-auto text-center last-paragraph-no-margin icon-with-text-style-08 pt-20px pb-20px ps-8 pe-8 md-ps-30px md-pe-30px bg-white border border-color-extra-medium-gray box-shadow-medium-bottom border-radius-100px xs-border-radius-10px">
                        <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                            <div class="feature-box-icon me-10px">
                                <i class="bi bi-chat-text icon-extra-medium text-base-color"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin text-dark-gray text-uppercase fs-15 fw-700 ls-05px">
                              TARIMDA İLERİ ADIMLAR ATALIM, BİRLİKTE BÜYÜYELİM  <a href="{{route('front.iletisim')}}" class="text-base-color text-decoration-line-bottom-medium border-1">Bize ulaşın</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="position-relative overflow-hidden">
            <div class="container">
                <div class="row justify-content-center align-items-center mb-3">
                    
                    <div class="col-xl-12 offset-xl-12 col-lg-12 text-center text-lg-start" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 800, "delay": 150, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="swiper position-relative cmagic-cursor" data-slider-options='{ "autoHeight": true, "loop": true, "allowTouchMove": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "effect": "slide" }'>
                            <div class="swiper-wrapper mb-10px">
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <span class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-block">Kurumsal </span>
                                    <h3 class="text-dark-gray fw-700 ls-minus-1px mb-20px">  {{$icerik->baslik}}  </h3>
                                    <p class="w-95 xl-w-100"> {!! $icerik->aciklama !!} </p>
                                </div>
                                <!-- end text slider item -->
                              
                            </div> 
                           
                        </div>
                    </div>
                </div>
            </div>
       
       
            <img src="{{asset('uploads/vdotnet.png')}}" class="position-absolute bottom-minus-50px right-minus-50px z-index-minus-1" data-bottom-top="transform: rotate(0deg) translateY(0)" data-top-bottom="transform:rotate(-15deg) translateY(0)" alt=""/>
     
     
        </section>
        <!-- end section -->
    
      
           
@endsection




@section('getJs') 
 
@endsection