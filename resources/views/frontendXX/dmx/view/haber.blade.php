@extends('frontend.layouts.master')


@section('getTitle')  Blog   @endsection


@section('getDescription')  Blog  @endsection


@section('getCss') 
 
@endsection



@section('getslideri')


<div class="sub-banner">
    <section class="banner-section">
        <figure class="mb-0 bgshape">
            <img src="{{asset('frontend/assets/images/homebanner-bgshape.png')}}" alt="" class="img-fluid">
        </figure>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="banner_content">
                        <h1>Blog</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span">Blog </span>
    </div>
</div>


@endsection


@section('content') 

 
   <!--End Slider Section-->
   <section class="blog-posts">
    <div class="container">
       <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <div id="blog" class="three-column col-xl-12">
             <div class="row">
            
            
                @foreach($haberler as $haber)

 
                <div class="col-xl-4 col-lg-4">
                   <div class="float-left w-100 post-item border mb-4">
                      <div class="post-item-wrap position-relative">
                         <div class="post-image">
                            <a href="{{route('front.blogdetay',['id' => $haber->url ])}}">

                                @if (isset($resimler[$haber->parentId]) && !empty($resimler[$haber->parentId]))
                                  @php
                                    $resim = reset($resimler[$haber->parentId]);  
                                    $resimUrl = asset($resim);  
                                   @endphp
                                @else
                                @php
                                    $resimUrl = "";  
                                @endphp
                               @endif


                            <img alt="{{ $haber->baslik }}" src="{{asset($resimUrl)}}">
                            </a>
                           
                            <!--post-image-->
                         </div>
                         <div class="post-item-description">
                             
                            <h2>
                               <a href="{{route('front.blogdetay',['id' => $haber->url ])}}">{{ $haber->baslik }} </a>
                            </h2>
                            @php
                            $aciklama = substr(strip_tags($haber->aciklama),0,60) ;  
                            
                            @endphp
                            <p class="text-size-16">{!! $aciklama !!}  </p>
                            <a href="{{route('front.blogdetay',['id' => $haber->url ])}}" class="item-link">İncele <i class="fa fa-arrow-right"></i></a>
                            <!--post-item-description-->
                         </div>
                         <!--post-item-wrap-->
                      </div>
                      <!--post-item-->
                   </div>
                   <!--col-->
                </div>
            
                @endforeach
              
            
             </div>
             <!--blog-->
          </div>
          <!--row-->
       </div>
       <!--container-->
    </div>
 </section>
<!-- Partner -->

@endsection




@section('getJs') 
 
@endsection
