@extends('frontend.layouts.master')

@section('getTitle') İletişim   @endsection

@section('getDescription')  İletişim   @endsection

 
@section('getCss') 
 
@endsection

@section('getslideri')
    
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography border-radius-6px lg-border-radius-0px p-0" data-parallax-background-ratio="0.5" style="background-image: url({{asset('uploads/icheader.png')}});  ">
        <div class="opacity-extra-medium bg-blue-whale"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="m-auto text-white text-shadow-double-large fw-600 ls-minus-2px"> İletişim </h1>
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
     <section id="down-section">
        <div class="container"> 
            <div class="row align-items-end justify-content-center mb-6 text-center text-lg-start sm-mb-8">                    
                <div class="col-xl-5 col-lg-7 col-md-10 md-mb-25px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-block">Size nasıl yardımcı olabiliriz?</span>
                    <h3 class="text-dark-gray fw-700 ls-minus-1px mb-0">Bizimle iletişime geçin!  </h3>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-5 col-md-10 last-paragraph-no-margin">
                    <p class="w-90 lg-w-100" data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                       
                        Bir projeniz mi var? Size yardımcı olmak için buradayız! Tüm sorularınızı yanıtlamaktan memnuniyet duyarız. Size en iyi şekilde hizmet vermek için heyecanlıyız. 
                        Yardıma veya bilgiye ihtiyaç duyduğunuzda bizimle iletişime geçebilirsiniz 
                    
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 mb-6 sm-mb-8" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col md-mb-30px text-center text-sm-start">
                    <span class="alt-font fs-18 fw-700 d-block w-90 text-dark-gray border-bottom border-2 border-color-dark-gray pb-15px mb-15px xs-w-100"><i class="feather icon-feather-map-pin d-inline-block icon-small me-10px"></i>Adres</span>
                    <div class="last-paragraph-no-margin">
                        <p>
                            {{config('site.firma_adres')}}  
                        </p>
                    </div>
                </div>
                <div class="col md-mb-30px text-center text-sm-start">
                    <span class="alt-font fs-18 fw-700 d-block w-90 text-dark-gray border-bottom border-2 border-color-dark-gray pb-15px mb-15px xs-w-100">
                        <i class="feather icon-feather-mail d-inline-block icon-small me-10px"></i>Email</span>
                    <a href="mailto:{{config('site.firma_email')}} ">{{config('site.firma_email')}}  </a><br>
                
                </div>
                <div class="col xs-mb-30px text-center text-sm-start">
                    <span class="alt-font fs-18 fw-700 d-block w-90 text-dark-gray border-bottom border-2 border-color-dark-gray pb-15px mb-15px xs-w-100">
                        <i class="feather icon-feather-phone d-inline-block icon-small me-10px"></i>Telefon</span>
                    <a href="tel:{{config('site.firma_telefon')}}">{{config('site.firma_telefon')}} </a><br>
                 
                </div>
                <div class="col text-center text-sm-start">
                    <span class="alt-font fs-18 fw-700 d-block w-90 text-dark-gray border-bottom border-2 border-color-dark-gray pb-15px mb-15px xs-w-100">
                        <i class="feather icon-feather-globe d-inline-block icon-small me-10px"></i>Whatsap</span>
                    <a href="https://wa.me/{{config('site.firma_whatsap')}}">{{config('site.firma_whatsap')}}</a><br>
                  
                </div>
            </div>
          

        </div>
    </section>
    <!-- end section -->
   
    <!-- start section -->
    <section class="bg-gradient-quartz-white position-relative z-index-0 sm-pt-0">
       
        <div class="container-fluid overflow-hidden position-relative pt-6 sm-pt-40px">
            <img src="{{asset('uploads/bg-04.png')}}" class="position-absolute top-0 left-minus-300px z-index-minus-1" data-bottom-top="transform: rotate(0deg) translateY(0)" data-top-bottom="transform:rotate(-15deg) translateY(0)" alt=""/>
            <div class="row justify-content-center mb-2 sm-mb-3">
                <div class="col-lg-6 text-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span class="ps-25px pe-25px mb-15px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-quartz-light-transparent d-inline-block">Bize ulaşın</span>
                    <h3 class="text-dark-gray fw-700 ls-minus-1px">Size nasıl yardımcı olabiliriz?</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-11">
                    <form action="{{route('contact.send')}}" method="post" class="contact-form-style-03">

                        @csrf
                        @method('post')

                        <div class="row justify-content-center" data-anime='{ "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label fw-600 text-dark-gray mb-0">İsminiz *</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required" id="exampleInputEmail1" type="text" name="isim" placeholder="İsminizi giriniz"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label fw-600 text-dark-gray mb-0">Email Adresiniz *</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required" id="exampleInputEmail2" type="email" name="email" placeholder="Email adresiniz" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label fw-600 text-dark-gray mb-0">Telefon *</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-telephone"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required" id="exampleInputEmail3" type="tel" name="telefon" placeholder="Telefon numaranız" required/>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label fw-600 text-dark-gray mb-0">Konu</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-journals"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required" id="exampleInputEmail4" type="text" name="konu" placeholder="Mesaj konusu" required/>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="exampleInputEmail1" class="form-label fw-600 text-dark-gray mb-0">Mesajınız</label>
                                <div class="position-relative form-group form-textarea mb-0"> 
                                    <textarea class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required" name="mesaj" placeholder="Mesajınızı giriniz" rows="4"></textarea>
                                    <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-7 col-md-8">
                                <p class="mb-0 fs-14 lh-24 text-center text-md-start">  </p>
                            </div>
                            <div class="col-xxl-6 col-lg-5 col-md-4 text-center text-md-end sm-mt-25px">
                                <input id="exampleInputEmail5" type="hidden" name="redirect" value="">
                                <button class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge text-transform-none primary-font  " type="submit">Gönder</button>
                            </div>
                            <div class="col-12">
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
    <!-- end section -->

    <div class="container-fluid overlap-section p-0">
        <div class="row g-0 justify-content-end overlap-section-one-fourth">
            <div class="col-md-12">
              
                {!! config('site.firma_harita') !!}  
          
            </div>
        </div>
    </div>


           
@endsection




@section('getJs') 
 
@endsection