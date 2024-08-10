@extends('frontend.layouts.master')


@section('getTitle')  {{$icerik->baslik}}   @endsection


@section('getDescription')  {{$icerik->baslik}}  @endsection


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
                        <h1>Kurumsal</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span">{{$icerik->baslik}} </span>
    </div>
</div>


@endsection


@section('content') 

 
<!--About Repay-->
<section class="about-repay">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="about-wrapper">
                    <figure class="circle mb-0">
                        <img src="{{asset('frontend/assets/images/image-2-bg.png')}}" alt="">
                    </figure>
                 
                    <figure class="image mb-0">
                        <img src="{{asset($resim1)}}" alt="" class="img-fluid">
                    </figure>
                    <figure class="homeelement mb-0">
                        <img src="{{asset('frontend/assets/images/homeelement.png')}}" alt="" class="img-fluid">
                    </figure>
                    <figure class="homeelement1 mb-0">
                        <img src="{{asset('frontend/assets/images/homeelement.png')}}" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="about-content"  data-aos="fade-up">
                    <h6>Kurumsal</h6>
                    <h2>{{$icerik->baslik}} </h2>
                   
                    <p class="text-size-18 text"> {!! $icerik->aciklama !!}  </p>
                


                </div>
            </div>
        </div>
    </div>
</section>
 
 

@endsection




@section('getJs') 
 
@endsection
