@extends('frontend.layouts.master')


@section('getTitle')  anasayfa  @endsection


@section('getDescription')  anasayfa @endsection


@section('getCss') 
 
@endsection



@section('getslideri')

<!--Banner-->
<section class="bannermain position-relative">
    <figure class="mb-0 bgshape">
        <img src="{{asset('frontend/assets/images/homebanner-bgshape.png')}}" alt="" class="img-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="banner" data-aos="fade-right">
                    <h6> {{getAllSlider()[0]->baslik }} </h6>
                    <h1> {{getAllSlider()[0]->baslik2 }}  </h1>
                    <p class="banner-text"> {{getAllSlider()[0]->deger1 }}   </p>
                    <div class="button"><a  class="button_text" href="{{getAllSlider()[0]->link }}">{{getAllSlider()[0]->deger2 }}</a></div>
                </div>
            </div>
            <div class=" col-lg-7 col-md-7 col-sm-12">
                <div class="banner-wrapper">
                    <figure class="mb-0 homeelement1">
                        <img src="{{asset('frontend/assets/images/homeelement1.png')}}" class="img-fluid" alt="">
                    </figure>
                    <figure class="mb-0 banner-image">
                        <img src="{{asset(getAllSlider()[0]->resim1)}}" class="img-fluid" alt="banner-image">
                    </figure>
                    <figure class="mb-0 content img-bg">
                        <img src="{{asset('frontend/assets/images/homebanner-img-bg.png')}}" alt="banner-image-bg">
                    </figure>
                    <figure class="mb-0 homeelement">
                        <img src="{{asset('frontend/assets/images/homeelement.png')}}" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('content') 

<!--What-we-do    -->
<section class="what-we-do position-relative">
    <div class="container">
        <figure class="element1 mb-0">
            <img src="./assets/images/what-we-do-icon-1.png" class="img-fluid" alt="">
        </figure>
        <div class="row">
            <div class="col-12">
                <div class="subheading" data-aos="fade-right">
                    <h6>{{getAllIcerikByParentId(9)[0]->baslik }} </h6>
                    <h2>{{getAllIcerikByParentId(9)[0]->kisaaciklama }} </h2>
                </div>
            </div>
        </div>
        <div class="row position-relative">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1">
                    <figure class="img">
                        <img src="{{asset(getAllIcerikByParentId(9)[1]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(9)[1]->baslik }} </h3>
                    <p class="mb-0 text-size-18">{{getAllIcerikByParentId(9)[1]->kisaaciklama }} </p>
                </div>
            </div>
            <figure class="arrow1 mb-0" data-aos="fade-down">
                <img src="{{asset('frontend/assets/images/what-we-do-arrow-1.png')}}"  class="img-fluid" alt="">
            </figure>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1 service2">
                    <figure class="img">
                        <img src="{{asset(getAllIcerikByParentId(9)[2]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(9)[2]->baslik }} </h3>
                    <p class="mb-0 text-size-18">{{getAllIcerikByParentId(9)[2]->kisaaciklama }} </p>
                </div>
            </div>
            <figure class="arrow2 mb-0" data-aos="fade-up">
                <img src="{{asset('frontend/assets/images/what-we-do-arrow-2.png')}}"  class="img-fluid" alt="">
            </figure>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1">
                    <figure class="img">
                        <img src="{{asset(getAllIcerikByParentId(9)[3]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(9)[3]->baslik }} </h3>
                    <p class="mb-0 text-size-18">v{{getAllIcerikByParentId(9)[3]->kisaaciklama }} </p>
                </div>
            </div>
            <figure class="element3 mb-0">
                <img src="{{asset('frontend/assets/images/what-we-do-element.png')}}" alt="">
            </figure>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">

            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="account" data-aos="fade-right">
                    <div class="accounticon">
                        <figure class="mb-0">
                            <img src="{{asset(getAllIcerikByParentId(9)[4]->dosya1)}}" class="img-fluid" alt="">
                        </figure>
                    </div>
                    <div class="heading">
                        <h3 class="mb-0">{{getAllIcerikByParentId(9)[4]->baslik }} </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="account" data-aos="fade-right">
                    <div class="accounticon">
                        <figure class="mb-0">
                            <img src="{{asset(getAllIcerikByParentId(9)[5]->dosya1)}}" class="img-fluid" alt="">
                        </figure>
                    </div>
                    <div class="heading">
                        <h3 class="mb-0">{{getAllIcerikByParentId(9)[5]->baslik }} </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">

            </div>
            <figure class="element2 mb-0">
                <img src="./assets/images/what-we-do-icon-2.png" class="img-fluid" alt="">
            </figure>
        </div>
    </div>
</section>




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
                        <img src="{{asset(getAllIcerikByParentId(10)[0]->dosya1)}}" alt="" class="img-fluid">
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
                    <h6>{{getAllIcerikByParentId(10)[0]->baslik }} </h6>
                    <h2>{{getAllIcerikByParentId(10)[0]->baslik2 }} </h2>
                    <p class="text-size-18">{{getAllIcerikByParentId(10)[0]->kisaaciklama }} </p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--Services section-->
<section class="service-section">
    <div class="container">
        <div class="row position-relative">
            <div class="service-content">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <figure class="mb-0 services-icon">
                        <img src="./assets/images/services-our-services-icon-1.png" class="img-fluid" alt="">
                    </figure>
                    <h6>{{getAllIcerikByParentId(11)[0]->baslik }} </h6>
                    <h2>{{getAllIcerikByParentId(11)[0]->baslik2 }} </h2>
                    <figure class="service-image" data-aos="fade-up">
                        <img src="{{asset(getAllIcerikByParentId(11)[0]->dosya1)}}" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>
        </div>

        <figure class="element1 mb-0">
            <img src="{{asset('frontend/assets/images/what-we-do-icon-1.png')}}" class="img-fluid" alt="">
        </figure>
        <div class="services-data">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-box">
                        <figure class="img img1">
                            <img src="{{asset(getAllIcerikByParentId(2)[0]->dosya1)}}" alt="" class="img-fluid">
                        </figure>
                        <div class="content">
                            <h3>{{getAllIcerikByParentId(2)[0]->baslik }}</h3>
                            @php
                            $aciklama1 = substr(strip_tags(getAllIcerikByParentId(2)[0]->aciklama),0,60) ;  
                            @endphp
                            <p class="text-size-18"> {!! $aciklama1 !!}</p>
                            <a href="{{route('front.blogdetay',['id' => getAllIcerikByParentId(2)[0]->url ])}}" class="more">İncele</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-box">
                        <figure class="img img2">
                            <img src="{{asset(getAllIcerikByParentId(2)[1]->dosya1)}}" alt="" class="img-fluid">
                        </figure>
                        <div class="content">
                            <h3>{{getAllIcerikByParentId(2)[1]->baslik }}</h3>
                            @php
                            $aciklama2 = substr(strip_tags(getAllIcerikByParentId(2)[1]->aciklama),0,60) ;  
                            @endphp
                            <p class="text-size-18"> {!! $aciklama2 !!}</p>
                            <a href="{{route('front.blogdetay',['id' => getAllIcerikByParentId(2)[1]->url ])}}" class="more">İncele</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-box">
                        <figure class="img img3">
                            <img src="{{asset(getAllIcerikByParentId(2)[2]->dosya1)}}" alt="" class="img-fluid">
                        </figure>
                        <div class="content">
                            <h3>{{getAllIcerikByParentId(2)[2]->baslik }}  </h3>
                            @php
                            $aciklama2 = substr(strip_tags(getAllIcerikByParentId(2)[2]->aciklama),0,60) ;  
                            @endphp
                            <p class="text-size-18"> {!! $aciklama2 !!}</p>
                            <a href="{{route('front.blogdetay',['id' => getAllIcerikByParentId(2)[2]->url ])}}" class="more">İncele</a>
                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-box">
                        <figure class="img img4">
                            <img src="{{asset(getAllIcerikByParentId(2)[3]->dosya1)}}" alt="" class="img-fluid">
                        </figure>
                        <div class="content">
                            <h3>{{getAllIcerikByParentId(2)[3]->baslik }} </h3>
                            @php
                            $aciklama3 = substr(strip_tags(getAllIcerikByParentId(2)[3]->aciklama),0,60) ;  
                            @endphp
                            <p class="text-size-18"> {!! $aciklama3 !!}</p>
                            <a href="{{route('front.blogdetay',['id' => getAllIcerikByParentId(2)[3]->url ])}}" class="more">İncele</a>
                       
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <figure class="mb-0 mobile-image" data-aos="fade-right">
                        <img src="{{asset('frontend/assets/images/services-mobile-image.png')}}" alt="" class="img-fluid">
                    </figure>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-box">
                        <figure class="img img5">
                            <img src="{{asset(getAllIcerikByParentId(2)[4]->dosya1)}}" alt="" class="img-fluid">
                        </figure>
                        <div class="content">
                            <h3>{{getAllIcerikByParentId(2)[4]->baslik }} </h3>
                            @php
                            $aciklama4 = substr(strip_tags(getAllIcerikByParentId(2)[4]->aciklama),0,60) ;  
                            @endphp
                            <p class="text-size-18"> {!! $aciklama4 !!}</p>
                            <a href="{{route('front.blogdetay',['id' => getAllIcerikByParentId(2)[4]->url ])}}" class="more">İncele</a>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <figure class="element2 mb-0">
            <img src="{{asset('frontend/assets/images/what-we-do-icon-2.png')}}" class="img-fluid" alt="">
        </figure>
    </div>
</section>






<!-- manage -->
<section class="manage-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="manage-content"  data-aos="fade-right">
                    <h2>{{getAllIcerikByParentId(12)[0]->baslik }}</h2>
                    <div class="first">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                <figure class="mb-0 icon">
                                    <img src="{{asset(getAllIcerikByParentId(12)[1]->dosya1)}}" alt="">
                                </figure>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                <div class="content">
                                    <h4>{{getAllIcerikByParentId(12)[1]->baslik }}</h4>
                                    <p class="text-size-16 text">{{getAllIcerikByParentId(12)[1]->kisaaciklama }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="secound">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                <figure class="mb-0 icon">
                                    <img src="{{asset(getAllIcerikByParentId(12)[2]->dosya1)}}" alt="">
                                </figure>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                <div class="content">
                                    <h4>{{getAllIcerikByParentId(12)[2]->baslik }}  </h4>
                                    <p class="text-size-16 text">{{getAllIcerikByParentId(12)[2]->kisaaciklama }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                <figure class="mb-0 icon">
                                    <img src="{{asset(getAllIcerikByParentId(12)[3]->dosya1)}}" alt="">
                                </figure>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                <div class="content">
                                    <h4>{{getAllIcerikByParentId(12)[3]->baslik }}</h4>
                                    <p class="text-size-16 text">{{getAllIcerikByParentId(12)[3]->kisaaciklama }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="manage-wrapper">
                    <figure class="mb-0 homeelement1">
                        <img src="{{asset('frontend/assets/images/homeelement1.png')}}" class="img-fluid" alt="">
                    </figure>
                    <figure class="mb-0 manage-image">
                        <img src="{{asset(getAllIcerikByParentId(12)[0]->dosya1)}}" class="img-fluid" alt="">
                    </figure>
                    <figure class="mb-0 content img-bg">
                        <img src="{{asset('frontend/assets/images/manageyour-mange-your-bg.png')}}" alt="" class="">
                    </figure>
                    <figure class="mb-0 homeelement">
                        <img src="{{asset('frontend/assets/images/homeelement.png')}}" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <figure class="mb-0 manage-layer">
        <img src="{{asset('frontend/assets/images/mange-layer.png')}}" alt="" class="img-fluid">
    </figure>
</section>
 

<!-- need more help? -->
<section class="need-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content" data-aos="fade-right">
                    <h6>{{getAllIcerikByParentId(13)[0]->baslik }}</h6>
                    <h2>  {{getAllIcerikByParentId(13)[0]->kisaaciklama }}  </h2>
                
                </div>
            </div>
        </div>
        <div class="row position-relative">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1">
                    <figure class="img img1">
                        <img src="{{asset(getAllIcerikByParentId(13)[1]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(13)[1]->baslik }}</h3>
                    <p class="text-size-18">{{getAllIcerikByParentId(13)[1]->kisaaciklama }} </p>
                    <a href="{{getAllIcerikByParentId(13)[1]->link }}" class="btn">İncele</a>
                </div>
            </div>
            <figure class="arrow1 mb-0" data-aos="fade-down">
                <img src="{{asset('frontend/assets/images/need-arrow1.png')}}" class="img-fluid" alt="">
            </figure>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1 service2">
                    <figure class="img img2">
                        <img src="{{asset(getAllIcerikByParentId(13)[2]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(13)[2]->baslik }} </h3>
                    <p class="text-size-18">{{getAllIcerikByParentId(13)[2]->kisaaciklama }} </p>
                    <a href="{{getAllIcerikByParentId(13)[2]->link }}" class="btn">İncele</a>
                </div>
            </div>
            <figure class="arrow2 mb-0" data-aos="fade-up">
                <img src="{{asset('frontend/assets/images/need-arrow-2.png')}}" class="img-fluid" alt="">
            </figure>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service1">
                    <figure class="img img3">
                        <img src="{{asset(getAllIcerikByParentId(13)[3]->dosya1)}}" alt="" class="img-fluid">
                    </figure>
                    <h3>{{getAllIcerikByParentId(13)[3]->baslik }} </h3>
                    <p class="text-size-18">{{getAllIcerikByParentId(13)[3]->kisaaciklama }} </p>
                    <a href="{{getAllIcerikByParentId(13)[3]->link }}" class="btn">İncele</a>
                </div>
            </div>
        </div>
    </div>
    <figure class="mb-0 need-layer">
        <img src="{{asset('frontend/assets/images/need-layer.png')}}" alt="" class="img-fluid">
    </figure>
</section>
<!-- Partner -->

@endsection




@section('getJs') 
 
@endsection
