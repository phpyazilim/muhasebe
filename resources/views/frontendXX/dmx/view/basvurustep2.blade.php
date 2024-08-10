@extends('frontend.layouts.master')


@section('getTitle')  Başvuru  @endsection


@section('getDescription')  Başvuru  @endsection


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
                        <h1>Ödeme Başvuru</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> Başvuru </span>
    </div>
</div>


@endsection


@section('content') 

 
  
 
  
 <!--Contact-->
<section class="message-section">
    <div class="container">
        <figure class="element1 mb-0">
            <img src="{{asset('frontend/assets/images/what-we-do-icon-1.png')}}" class="img-fluid" alt="">
        </figure>
        <div class="row position-relative">
            <div class="col-12">
                <div class="content">
                    <h6> Aşağıdaki Formu Doldurarak Başvuru Yapabilirsiniz</h6>
                    <h2>Üye İşyeri Bilgi Formu</h2>
                    <figure class="element3 mb-0">
                        <img src="{{asset('frontend/assets/images/what-we-do-element.png')}}" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="message_content" data-aos="fade-up">
                    <form id="contactpage" method="POST" action="{{route('front.basvurusave')}}" enctype="multipart/form-data" >
                        @csrf
                        @method('post')


                        @foreach ($formData as $key => $value)
                           <input type="hidden" name="{{$key}}" value="{{ $value }}">  
                        @endforeach  



                        <div class="row">
                          
                           

                            @if ($ortaklikYapisi == "tuzel")
                               @include('frontend.layouts.dernek_belge')
                            @elseif ($ortaklikYapisi == "sahis")
                               @include('frontend.layouts.sahis_firma_belge')
                            @elseif ($ortaklikYapisi == "dernek")
                               @include('frontend.layouts.tuzel_kisi_belge')
                            @else
         
                            @endif
                           
                            
 

 
                        </div>
                        <div class="manage-button text-center">
                            <button type="submit" class="submit">Başvuruyu Tamamla </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

 
 

@endsection




@section('getJs') 
 
@endsection
