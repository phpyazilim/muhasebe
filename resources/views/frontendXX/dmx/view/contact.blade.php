@extends('frontend.layouts.master')


@section('getTitle')  İletişim  @endsection


@section('getDescription') İletişim @endsection


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
                        <h1>İletişim</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="box">
        <span class="mb-0 text-size-16">Anasayfa</span><span class="mb-0 text-size-16 dash">-</span><span class="mb-0 text-size-16 box_span"> İletişim </span>
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
                    <h6>Bize Ulaşın</h6>
                    <h2>Bizimle İletişime Geçin</h2>
                    <figure class="element3 mb-0">
                        <img src="{{asset('frontend/assets/images/what-we-do-element.png')}}" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="message_content" data-aos="fade-up">
                    <form id="contactpage" method="POST" action="{{route('contact.send')}}" >
                        @csrf
                        @method('post')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-0"> 
                                    <h4>İsim:</h4>
                                    <input type="text" class="form_style" placeholder="İsminizi Giriniz" required name="isim" autocomplete="off"> 
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Email:</h4>
                                    <input type="email" class="form_style"  name="email" placeholder="Email adresiniz" required  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <h4>Phone:</h4>
                                    <input type="tel" class="form_style" name="telefon" placeholder="Telefon numaranız" required  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0"> 
                                    <h4>Message:</h4>   
                                    <textarea class="form_style"  rows="3" name="konu" placeholder="Mesaj konusu" required  autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="manage-button text-center">
                            <button type="submit" class="submit">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="map">
                    {!! config('site.firma_harita') !!}  
                </div>
                <figure class="element2 mb-0">
                    <img src="{{asset('frontend/assets/images/what-we-do-icon-2.png')}}" class="img-fluid" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>

@endsection




@section('getJs') 
 
@endsection
