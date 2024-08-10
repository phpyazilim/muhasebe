@extends('frontend.layouts.master')


@section('getTitle')  Referanslarımız  @endsection


@section('getDescription') Referanslarımız @endsection


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
                        <h1>Referanslarımız</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> Referanslarımız </span>
    </div>
</div>


@endsection


@section('content') 

 
<!--About Repay-->
<section class="about-repay">
    <div class="container">
        <div class="row">
            

            @foreach($images as $logo)


            <div class="col-lg-2 col-md-2 col-sm-12 col-12" style="padding:10px">
                 <img src="{{$logo->url}}" style="width:80%"> 
            </div>

            @endforeach






            

        </div>
    </div>
</section>
 
 

@endsection




@section('getJs') 
 
@endsection
