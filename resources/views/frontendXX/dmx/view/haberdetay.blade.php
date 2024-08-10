@extends('frontend.layouts.master')


@section('getTitle')   {{$haber->baslik}}    @endsection


@section('getDescription')   {{$haber->baslik}}    @endsection


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
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> {{$haber->baslik}}  </span>
    </div>
</div>


@endsection


@section('content') 

 
   
<!-- MAIN SECTION -->
<section class="blog-posts single-post">
   <div class="container">
       <div class="row">
           <div class="col-xl-9 col-lg-9">
               <div id="blog" class="single-post01">
                   <div class="post-item">
                       <div class="post-item-wrap">
                           <div class="post-image" data-aos="fade-up">
                               <a href="#">
                                   <img alt="" src="{{ asset($resim->url ?? '') }}">
                               </a>
                               <!--post-image-->
                           </div>
                           <div class="post-item-description">
                               <h2 class="single-post-heading font_weight_600"> {{$haber->baslik}} </h2>
                               <div class="post-meta">
                                   
                                 
                                 
                                   <div class="post-meta-share float-right">
                                       <ul class="list-unstyled m-0">
                                           <li class="d-inline-block align-top"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                                               <i class="fab fa-facebook-square"></i>
                                           </a></li>
                                           <li class="d-inline-block align-top"><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{$haber->baslik}}" target="_blank">
                                               <i class="fab fa-twitter-square"></i>
                                           </a></li>
                                           <li class="d-inline-block align-top"><a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" target="_blank">
                                               <i class="fab fa-linkedin"></i>
                                           </a></li>
                                           <li class="d-inline-block align-top"><a href="mailto:{{config('site.firma_email')}}?subject={{ $haber->baslik}}" target="_blank">
                                               <i class="fas fa-envelope-square"></i>
                                           </a></li>
                                       </ul>
                                       <!--post-meta-share-->
                                   </div>
                                   <!--post-meta-->
                               </div>
                               <p class="text-size-16">
                                 
                                 {!! $haber->aciklama !!}   
                                 
                                 </p>
                               
                              
                           </div>
                          
                           <div class="post-navigation">
                               <a href="{{ isset($oncekiKayit->url) ? route("front.blogdetay", ['id' => $oncekiKayit->url]) : '#' }}" class="post-prev">
                                   <div class="post-prev-title"><span>Önceki Blog</span></div>
                               </a>
                               <a href="{{ isset($sonrakiKayit->url) ? route("front.blogdetay", ['id' => $sonrakiKayit->url]) : '#' }}" class="post-next">
                                   <div class="post-next-title"><span>Sonraki Blog</span></div>
                               </a>
                               <!--post-navigation-->
                           </div>
                          
                          
                           <!--post-item-wrap-->
                       </div>
                       <!--post-item-->
                   </div>
                   <!--single-post01-->
               </div>
               <!--col-->
           </div>
           <div class="sidebar sticky-sidebar col-lg-3">
               <div class="theiaStickySidebar">
                   <div class="widget widget-newsletter">
                       <form id="widget-search-form-sidebar" class="form-inline" method="post" action="{{route('front.blogara')}}">
                        @csrf
                        @method('post')

                           <div class="input-group">
                               <input type="text" aria-required="true" name="aranan" class="form-control widget-search-form" placeholder="Blog Ara...">
                               <div class="input-group-append">
                                   <span class="input-group-btn">
                                       <button type="submit" id="widget-widget-search-form-button" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                   <!--input-group-append-->
                               </div>
                               <!--input-group-->
                           </div>
                           <!--form-inline-->
                       </form>
                       <!--widget-->
                   </div>


                   <div class="widget widget-categories">
                     <div class="widget-title font_weight_600">Kategoriler</div>
                     <ul>

                        @foreach(getAllIcerikByParentId(4 ) as $kategori)

                         <li class="cat-item">
                             <a href="{{route('front.blogkategori',['id' => $kategori->url ])}}">{{$kategori->baslik}}</a>
                           {{--   <span class="cat-count-span">(2)</span> --}}
                         </li>
                        
                         @endforeach
                       
                     </ul>
                 </div>



                   <div class="widget">
                       <div class="tabs">
                           <ul class="nav nav-tabs" id="tabs-posts" role="tablist">
                               <li class="nav-item">
                                   <a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">
                                    
                                    Son Eklenenler
                                   </a>
                               </li>
                               
                               <!--nav-tabs-->
                           </ul>
                           <div class="tab-content" id="tabs-posts-content">
                               <div class="tab-pane fade show active" id="popular" role="tabpanel">
                                   <div class="post-thumbnail-list">
                                      

                                    @php
                                       $counter = 0;
                                    @endphp

                                    @foreach($haberler as $haberi)
                                       @if($counter < 5)
                                           

                                          <div class="post-thumbnail-entry">
                                             <img data-aos="fade-up" alt="" src="{{ asset($resimler[$haberi->parentId][0] ?? '') }}">
                                             <div class="post-thumbnail-content">
                                                 <a href="{{route('front.blogdetay',['id' => $haberi->url ])}}">{{ $haberi->baslik }} </a>
                                                 
                                                 <!--post-thumbnail-content-->
                                             </div>
                                             <!--post-thumbnail-entry-->
                                         </div>



                                          @php
                                                $counter++;
                                          @endphp
                                       @else
                                          @break
                                       @endif
                                    @endforeach


                                    
                                   

                                      


                                   </div>
                                   <!--tab-pane-->
                               </div>
                            
                               <!--tab-content-->
                           </div>
                           <!--tabs-->
                       </div>
                       <!--widget-->
                   </div>
                 


  
                   
                   <!--theiaStickySidebar-->
               </div>
               <!--sidebar-->
           </div>
           <!--row-->
       </div>
   </div>
<!--container-->
</section>
<!-- Partner -->



@endsection




@section('getJs') 
 
@endsection
