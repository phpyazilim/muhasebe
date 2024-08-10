@extends('frontend.layouts.master')


@section('getTitle')  Resim Galeri  @endsection


@section('getDescription')  Resim Galeri  @endsection


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
                        <h1> Resim Galeri</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> Resim Galeri</span>
    </div>
</div>


@endsection


@section('content') 

 
<section class="blog-posts">
    <div class="container">
       <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <div id="blog" class="col-xl-12">
             <div class="row">


                @foreach($resimler as $resim)

                <div class="col-xl-3 col-lg-6">
                    <div class="float-left w-100 post-item border mb-4">
                       <div class="post-item-wrap position-relative">
                          <div class="post-image">
                             <a class="example-image-link"  href="{{asset($resim)}}"  data-lightbox="example-set" data-title="">
                             <img alt="" src="{{asset($resim)}}" class="example-image">
                             </a>
                            
                          </div>
                          
                          <!--post-item-wrap-->
                       </div>
                       <!--post-item-->
                    </div>
                    <!--col-->
                 </div>

  
                 @endforeach




              </div>
           </div>
        </div>
    </div>

 </section>


@endsection




@section('getJs') 
 

