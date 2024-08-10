


@extends('frontend.layouts.master')

@section('getTitle')  Kategoriler  @endsection

@section('getDescription')  Kategoriler  @endsection

 
@section('getCss') 
 
@endsection

@section('getslideri')
    
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography border-radius-6px lg-border-radius-0px p-0" data-parallax-background-ratio="0.5" style="background-image: url({{asset('uploads/icheader.png')}});  ">  
        <div class="opacity-extra-medium bg-blue-whale"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="m-auto text-white text-shadow-double-large fw-600 ls-minus-2px">  Kategoriler </h1>
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
            <section class="bg-gradient-quartz-white border-radius-6px"> 
                <div class="container">
                   
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                     

                        
                        @foreach( getAllCategories() as $kategori)
                     
                     
                        <!-- start team member item --> 
                        <div class="col team-style-08 border-radius-6px md-mb-30px">
                            <figure class="mb-30 position-relative overflow-hidden border-radius-4px">
                                <img src="{{asset($kategori->dosya1)}}" alt="" />
                                <figcaption class="w-100 h-100 d-flex align-items-end p-13 lg-p-8 md-p-10 bg-gradient-base-transparent border-radius-6px">
                                    <div class="w-100">
                                        <span class="team-member-name fw-500 text-white d-block">{{ $kategori->baslik }}</span>
                                    
                                    </div>
                                    <div class="social-icon d-flex flex-column flex-shrink-1">
                                        <a href="{{route('front.urunler',['id' => $kategori->url])}}" target="_blank" class="text-dark-gray bg-white">
                                            <i class="fa fa-search icon-small"></i></a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- end team member item -->  

                        @endforeach

                      
                    </div>
                </div>
            </section>
            <!-- end section -->
         
    
      
           
@endsection




@section('getJs') 
 
@endsection