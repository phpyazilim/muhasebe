<!doctype html>
<html class="no-js" lang="en">

    <head>
        @include('frontend.layouts.style')
       @yield('getCss')
    </head>

    <body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#242E45">
        <div class="box-layout">
            <!-- start header -->
            <header>
  
                <!-- start navigation -->
                <nav class="navbar navbar-expand-lg header-light bg-white disable-fixed">
                    <div class="container-fluid">
                        <div class="col-auto col-xl-3 col-lg-2 me-lg-0 me-auto" style="padding:0">
                            <a class="navbar-brand" href="{{route('front.home')}}">
                                <img src="{{config('site.firma_ustlogo')}}" data-at2x="{{config('site.firma_ustlogo')}}" alt="" class="default-logo" style="width: 100%">
                             <!--    <img src="{{config('site.firma_ustlogo')}}" data-at2x="{{config('site.firma_ustlogo')}}" alt="" class="xalt-logo" style="width: 400px !important "> -->
                                <img src="{{config('site.firma_ustlogo')}}" data-at2x="{{config('site.firma_ustlogo')}}" alt="" class="mobile-logo" style="width: 300px !important ">
                            </a>
                        </div>
                        <div class="col-auto col-xl-6 col-lg-8 menu-order position-static">
                            <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                                <span class="navbar-toggler-line"></span>
                                <span class="navbar-toggler-line"></span>
                                <span class="navbar-toggler-line"></span>
                                <span class="navbar-toggler-line"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="{{route('front.home')}}" class="nav-link">Anasayfa</a></li> 
                                    <li class="nav-item dropdown dropdown-with-icon-style02">
                                        <a href="javascript:{}" class="nav-link">Kurumsal</a>
                                        <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                          
                                            

                                            @foreach(getAllIcerikByParentId(1 ) as $kurumsal)

                                            <li><a href="{{route('front.icerik',['id' => $kurumsal->url ])}}"> {{ $kurumsal->baslik }}  </a></li>
                                            
                                            @endforeach
                                       
                                        </ul>
                                    </li>

                                  <!--  <li class="nav-item"><a href="{{route('front.kategori')}}"  class="nav-link">Ürünlerimiz</a></li> -->
                                  <li class="nav-item"><a href="{{route('front.urundetay',['id' => 'kepce'])}}"  class="nav-link">Ürünlerimiz</a></li> 



                                    <li class="nav-item"><a href="{{route('front.haber')}}" class="nav-link">Bizden Haberler</a></li> 
                                    <li class="nav-item"><a href="{{route('front.iletisim')}}" class="nav-link">İletişim</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto col-xl-3 col-lg-2 text-end md-pe-0">
                            <div class="header-icon">
                                <div class="header-search-icon icon">
                                    <a href="#" class="search-form-icon header-search-form"><i class="feather icon-feather-search"></i></a>
                                    <!-- start search input -->
                                    <div class="search-form-wrapper">
                                        <button title="Close" type="button" class="search-close">×</button>
                                        <form id="search-form" role="search" method="post" class="search-form text-left" action="{{route('front.search')}}">

                                           @csrf
                                           @method('post')

                                            <div class="search-form-box">
                                                <h2 class="text-dark-gray text-center fw-600 mb-4 ls-minus-1px">Ürün arayın</h2>
                                                <input class="search-input" id="search-form-input5e219ef164995" placeholder="Bir kelime girin..." name="aranan"   type="text" autocomplete="off" required>
                                                <button type="submit" class="search-button">
                                                    <i class="feather icon-feather-search" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end search input -->
                                </div>
                                <div class="header-button ms-20px d-none d-xl-inline-block">
                                    <a href="{{route('front.iletisim')}}" class="btn btn-rounded btn-transparent-light-gray border-1 btn-medium btn-switch-text text-transform-none">
                                        <span>
                                            <span class="btn-double-text fw-600" data-text="Bize Ulaşın">Bize Ulaşın</span>
                                            <span><i class="fa-regular fa-envelope"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- end navigation -->
            </header>
            <!-- end header -->



          
 
           @yield('getslideri')
 
           @yield('content')


            <!-- start footer -->
            <footer class="p-0 fs-16 border-top border-color-extra-medium-gray">
                <div class="container"> 
                    <div class="row justify-content-center pt-6 sm-pt-40px">
                        <!-- start footer column -->
                        <div class="col-6 col-xl-3 col-lg-12 col-sm-12 last-paragraph-no-margin text-xl-start text-lg-center order-sm-1 lg-mb-50px sm-mb-30px">
                            <a href="{{route('front.home')}}" class="footer-logo mb-15px d-inline-block"><img src="{{config('site.firma_altlogo')}}" data-at2x="{{config('site.firma_altlogo')}}" alt="" style="width: 100%"></a>
                            <p class="lh-30 w-90 xl-w-100 mx-lg-auto mx-xl-0">Tarımın Geleceğini Birlikte Şekillendiriyoruz</p>
                            <div class="elements-social social-icon-style-02 mt-20px xs-mt-15px">
                                <ul class="medium-icon dark">
                                    <li class="my-0"><a class="facebook" href="{{config('site.firma_facebook')}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li class="my-0"><a class="instagram" href="{{config('site.firma_instagram')}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li> 
                                    <li class="my-0"><a class="twitter" href="{{config('site.firma_twitter')}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li> 
                                    <li class="my-0"><a class="youtube" href="{{config('site.firma_youtube')}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <!-- end footer column -->
                        <!-- start footer column -->
                        <div class="col-6 col-xl-3 col-lg-4 col-sm-5 xs-mb-30px order-sm-3 order-lg-3">
                            <span class="fs-17 fw-600 d-block text-dark-gray mb-5px">Kurumsal</span>
                            <ul>
                                @foreach(getAllIcerikByParentId(1 ) as $kurumsal)

                                <li><a href="{{route('front.icerik',['id' => $kurumsal->url ])}}"> {{ $kurumsal->baslik }}  </a></li>
                                
                                @endforeach
                              
                               
                            </ul>
                        </div>
                        <!-- end footer column -->
                        <!-- start footer column -->
                        <div class="col-6 col-xl-2 col-lg-4 col-sm-5 xs-mb-30px order-sm-4 order-lg-4">
                            <span class="fs-17 fw-600 d-block text-dark-gray mb-5px">Hızlı Menu</span>
                            <ul>
                              <!--  <li><a href="{{route('front.kategori')}}">Ürünlerimiz</a></li> -->
                                <li><a href="{{route('front.urundetay',['id' => 'kepce'])}}">Ürünlerimiz</a></li> 
                                <li><a href="{{route('front.haber')}}">Bizden Haberler</a></li>
                                <li><a href="{{route('front.iletisim')}}">İletişim</a></li>
                             
 

                            </ul>
                        </div>
                        <!-- end footer column -->
                     
                        <!-- start footer column -->
                        <div class="col-xl-4 col-lg-4col-sm-6 md-mb-50px sm-mb-30px xs-mb-0 order-sm-2 order-lg-5">
                            <span class="fs-17 fw-600 d-block text-dark-gray mb-5px">İletişim </span>
                            <p class="lh-30 w-95 sm-w-100 mb-15px">Adres : {{config('site.firma_adres')}}  </p>
                            <p class="lh-30 w-95 sm-w-100 mb-15px">Telefon : {{config('site.firma_telefon')}}  </p>
                            <p class="lh-30 w-95 sm-w-100 mb-15px">Email : {{config('site.firma_email')}}  </p>
                            <p class="lh-30 w-95 sm-w-100 mb-15px">Gsm  : {{config('site.firma_gsm')}}  </p>
                            <p class="lh-30 w-95 sm-w-100 mb-15px">Whatsapp  : {{config('site.firma_whatsap')}}  </p>
                            
                        </div>
                        <!-- end footer column -->                      
                    </div>
                    <div class="row justify-content-center align-items-center pt-2">
                        <!-- start divider -->
                        <div class="col-12">
                            <div class="divider-style-03 divider-style-03-01 border-color-transparent-white-light"></div>
                        </div>
                        <!-- end divider -->
                        <!-- start copyright -->
                        <div class="col-lg-5 pt-35px pb-35px md-pt-0 order-2 order-lg-1 text-center text-lg-start last-paragraph-no-margin">
                            <p>&copy; <?=date("Y")?> Karahisarlı Tarım   </p>  </div>
                        <!-- end copyright -->
                        <!-- start footer menu -->
                        <div class="col-lg-7 pt-35px pb-35px md-pt-25px md-pb-5px order-1 order-lg-2 text-center text-lg-end">
                            <ul class="footer-navbar sm-lh-normal"> 
                                <li><a href="{{route('front.sayfa',['id' => 'gizlilik-politikasi'])}}" class="nav-link">Gizlilik Politikası</a></li>
                                <li><a href="{{route('front.sayfa',['id' => 'kvkk'])}}" class="nav-link">KVKK</a></li>
                                <li><a href="{{route('front.sayfa',['id' => 'telif-hakki'])}}" class="nav-link">Telif Hakkı</a></li>
                            </ul>
                        </div>
                        <!-- end footer menu -->
                    </div>
                </div> 
            </footer>
            <!-- end footer -->
            <!-- start scroll progress -->
            <div class="scroll-progress d-none d-xxl-block">
                <a href="#" class="scroll-top" aria-label="scroll">
                    <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
                </a>
            </div>
            <!-- end scroll progress -->
        </div>



     

        @include('frontend.layouts.script')
        @yield('getJs')
    </body>

</html>



