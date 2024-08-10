@extends('frontend.layouts.master')

@section('getTitle')   @endsection

@section('getDescription')  @endsection

 
@section('getCss') 
 
@endsection

@section('getslideri')
      <!-- start slider -->
  <section id="slider" class="p-0 top-space-margin ">
    <div class="demo-corporate-slider_wrapper fullscreen-container" data-alias="portfolio-viewer" data-source="gallery"  style="background-image: url({{asset('uploads/sayfa.webp')}});  ">
        <div id="demo-corporate-slider" class="rev_slider bg-regal-blue fullscreenbanner" style="display:none;" data-version="5.3.1.6">
            <!-- begin slides list -->
            <ul>
                @php
                $i = 0;
                @endphp
                @foreach(getAllSlider( "tr")  as $slider)
                @php
                   $i++;
                @endphp

               
               
                <!-- minimum slide structure -->
                <li data-index="rs-{{ $i }}" data-transition="parallaxleft" data-slotamount="default"
                    data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                    data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off"
                    data-title="Crossfit" data-param1="" data-param2="" data-param3="" data-param4=""
                    data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
                    data-description="">
                    <!-- slide's main background image -->
                    <img src="{{$slider->resim1}}" alt="Image"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                         class="rev-slidebg" data-no-retina>
                    <!-- start overlay layer -->
                    <div class="tp-caption tp-shape tp-shapewrapper " id="slide-{{ $i }}-layer-01"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                         data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                         data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},
                         {"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' style="background:rgba(22,35,63,0.1); z-index: 0;">
                    </div>
                    <!-- end overlay layer -->
                    <!-- start shape layer -->
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-regal-blue border-radius-50"
                         id="slide-{{ $i }}-layer-02" data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                         data-voffset="['0','0','0','0']" data-width="['900','700','700','600']"
                         data-height="['900','700','700','600']" data-whitespace="nowrap" data-type="shape"
                         data-responsive_offset="on"
                         data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:0.5;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                    </div>
                    <!-- end shape layer -->
                    <!-- start shape layer -->
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-regal-blue border-radius-50"
                         id="slide-{{ $i }}-layer-03" data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                         data-voffset="['0','0','0','0']" data-width="['1200','1000','900','800']"
                         data-height="['1200','1000','900','800']" data-whitespace="nowrap" data-type="shape"
                         data-responsive_offset="on"
                         data-frames='[{"delay":1300,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:0.3;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                    </div>
                    <!-- end shape layer -->
                    <!-- start row zone layer -->
                    <div id="rrzm_638" class="rev_row_zone rev_row_zone_middle">
                        <!-- start row layer -->
                        <div class="tp-caption  " id="slide-{{ $i }}-layer-04" data-x="['left','left','left','left']"
                             data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-426','-426','-426','-426']" data-width="none" data-height="none"
                             data-whitespace="nowrap" data-type="row" data-columnbreak="3"
                             data-responsive_offset="on" data-responsive="off"
                             data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]" data-paddingright="[100,75,50,30]"
                             data-paddingbottom="[0,0,0,0]" data-paddingleft="[100,75,50,30]">
                            <!-- start column layer -->
                            <div class="tp-caption" id="slide-{{ $i }}-layer-05" data-x="['left','left','left','left']"
                                 data-hoffset="['100','100','100','100']" data-y="['top','top','top','top']"
                                 data-voffset="['100','100','100','100']" data-width="none" data-height="none"
                                 data-whitespace="nowrap" data-type="column" data-responsive_offset="on"
                                 data-responsive="off"
                                 data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-columnwidth="100%" data-verticalalign="top"
                                 data-textAlign="['center','center','center','center']">
                                <!-- start subtitle layer -->
                                <div class="tp-caption mx-auto text-uppercase" id="slide-{{ $i }}-layer-06"
                                     data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['0','0','0','0']" data-fontsize="['13','13','13','13']"
                                     data-lineheight="['20','20','20','20']"
                                     data-fontweight="['500','500','500','500']"
                                     data-letterspacing="['1','1','1','1']"
                                     data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                     data-width="['800','auto','auto','auto']" data-height="auto"
                                     data-whitespace="normal" data-basealign="grid" data-type="text"
                                     data-responsive_offset="off" data-verticalalign="middle"
                                     data-responsive="off"
                                     data-frames='[{"delay":2500,"speed":800,"frame":"0","from":"y:-50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[25,25,10,10]" data-paddingleft="[0,0,0,0]"
                                     style="word-break: initial;">
                                   {{$slider->baslik}}  
                                </div>
                                <!-- end subtitle layer -->
                                <!-- start title layer -->
                                <div class="tp-caption mx-auto" id="slide-{{ $i }}-layer-07"
                                     data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['0','0','0','0']" data-fontsize="['75','60','70','50']"
                                     data-lineheight="['70','65','75','55']"
                                     data-fontweight="['700','700','700','700']"
                                     data-letterspacing="['-2','-2','-2','0']"
                                     data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                     data-width="['700','600','600','auto']" data-height="auto"
                                     data-whitespace="normal" data-basealign="grid" data-type="text"
                                     data-responsive_offset="off" data-verticalalign="middle"
                                     data-responsive="on"
                                     data-frames='[{"delay":"1500","split":"chars","splitdelay":0.03,"speed":800,"split_direction":"middletoedge","frame":"0","from":"x:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power4.easeOut"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[33,28,35,25]" data-paddingleft="[0,0,0,0]"
                                     style="word-break: initial; text-shadow: #0b1236 3px 3px 15px;">
                                     {{$slider->baslik2}} 
                                </div>
                                <!-- end title layer -->
                                <!-- start text layer -->
                                <div class="tp-caption mx-auto" id="slide-{{ $i }}-layer-08"
                                     data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['0','0','0','0']" data-fontsize="['20','20','24','20']"
                                     data-lineheight="['36','36','40','30']"
                                     data-fontweight="['300','300','300','300']"
                                     data-letterspacing="['0','0','0','0']"
                                     data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                     data-width="['500','500','auto','auto']" data-height="auto"
                                     data-whitespace="normal" data-basealign="grid" data-type="text"
                                     data-responsive_offset="off" data-verticalalign="middle"
                                     data-responsive="on"
                                     data-frames='[{"delay":2500,"speed":800,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:0.6;fb:0;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[36,36,60,40]" data-paddingleft="[0,0,0,0]">
                                     {{$slider->deger1}} 
                                </div>
                                <!-- end text layer -->
                                <!-- start button layer -->
                                <div class="tp-caption tp-resizeme" id="slide-{{ $i }}-layer-09"
                                     data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                     data-voffset="['0','0','0','0']" data-width="auto" data-height="none"
                                     data-whitespace="nowrap" data-fontsize="['18','16','16','16']"
                                     data-lineheight="['70','55','55','55']" data-type="text"
                                     data-responsive_offset="off" data-responsive="off"
                                     data-frames='[{"delay":3000,"speed":1000,"frame":"0","from":"y:100px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[75,70,65,60]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[45,35,30,30]">
                                    <a href="{{route('front.kategori')}}"
                                       class="btn btn-extra-large get-started-btn btn-rounded with-rounded btn-gradient-flamingo-amethyst-green btn-box-shadow">
                                      
                                       Ürünlerimizi İnceleyin
                                       
                                       <span class="bg-white text-base-color"><i
                                                class="fa-solid fa-arrow-right"></i></span></a>
                                </div>
                                <!-- end button layer -->
                            </div>
                            <!-- end column layer -->
                        </div>
                        <!-- end row layer -->
                    </div>
                    <!-- end row zone layer -->
                    <!--  
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-base-color border-radius-50"
                         id="slide-{{ $i }}-layer-10" data-x="['center','center','center','center']"
                         data-hoffset="['510','410','310','0']" data-y="['middle','middle','middle','middle']"
                         data-voffset="['-320','-250','-250','0']" data-width="['122','122','120','120']"
                         data-height="['122','122','120','120']" data-visibility="['on','on','off','off']"
                         data-whitespace="nowrap" data-basealign="grid" data-type="shape"
                         data-responsive_offset="on"
                         data-frames='[{"delay":3500,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                    </div>
                  
                     
                    <div class="tp-caption d-inline-block" id="slide-{{ $i }}-layer-11"
                         data-x="['center','center','center','center']" data-hoffset="['510','410','310','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-305','-250','-250','0']"
                         data-visibility="['on','on','off','off']" data-fontsize="['13','13','13','13']"
                         data-lineheight="['16','16','16','16']" data-fontweight="['500','600','600','600']"
                         data-letterspacing="['0','0','0','0']"
                         data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                         data-width="['100','100','100','100']" data-height="auto" data-whitespace="normal"
                         data-basealign="grid" data-type="text" data-responsive_offset="on"
                         data-verticalalign="middle" data-responsive="on"
                         data-frames='[{"delay":3700,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]" data-paddingbottom="[33,0,0,0]"
                         data-paddingleft="[0,0,0,0]" style="word-break: initial;">
                        <i class="bi bi-patch-check-fill icon-extra-medium d-block pb-10px"></i> <span
                            class="d-block text-uppercase">Decided quality</span>
                    </div>
                      -->
                </li>
              
                @endforeach
              
              
            </ul>
            <div class="tp-bannertimer"
                 style="height: 10px; background-color: rgba(0, 0, 0, 0.10); z-index: 98"></div>
        </div>
    </div>
</section>
<!-- end slider -->

@endsection



@section('content') 

          
            <!-- start section -->
            <section>
                <div class="container">
                    <div class="row justify-content-center align-items-center mb-6 sm-pb-9">
                        <div class="col-lg-6 col-md-9 position-relative md-mb-15 text-center text-lg-start"
                             data-anime='{ "el": "childs", "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 15, "easing": "easeOutQuad" }'>
                            <div class="absolute-middle-center z-index-9 counter-style-02 text-center">
                                <span class="fs-160 fw-800 text-dark-gray ls-minus-10px xs-ls-minus-5px position-relative lg-fs-130 xs-fs-75">48<sub class="align-top fs-80 lg-fs-70 text-dark-gray position-relative top-minus-3px">+</sub></span>
                                <span class="d-block mx-auto fs-20 fw-500 lh-26 w-70 text-center text-dark-gray xs-w-100">Yıllık Tecrübe</span>
                            </div>
                            <img src="{{asset('uploads/anasayfa_kurumsal_bg.png')}}" alt="">
                            <img src="xxxvia.placeholder.com/345x366" class="position-absolute top-50 left-minus-100px lg-left-minus-40px sm-left-minus-30px lg-w-50 sm-w-55" data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-220px)" alt="">
                            <img src="xximages/demo-corporate-02.png" class="position-absolute top-0px xl-top-minus-10px w-170px right-20px md-right-40px xs-w-40" data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)" alt="">
                        </div>
                        <div class="col-lg-6 ps-6 text-center text-lg-start lg-ps-15px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <span class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-block">Karahisarlı Tarım</span>
                            <h3 class="text-dark-gray fw-700 ls-minus-1px">Hakkımızda</h3>
                            <p class="w-80 xl-w-90 lg-w-100 mb-40px sm-mb-25px"> 
                                
                                 
                                Karahisarlı Tarım Makinaları, 1976 yılında kurulduğundan bu yana tarım sektöründe yenilikçi çözümler sunmaktadır. Başlangıçta Harman Makinaları (Patos) ile Konya, İç Anadolu, Batı ve Orta Karadeniz, Doğu Marmara, Çukurova ve Doğu Anadolu bölgelerinde faaliyet gösteren firmamız, yıllar içinde tarım teknolojilerindeki gelişmelere uyum sağlayarak ürün yelpazesini genişletmiştir. 1995'ten itibaren Konya'da modern tarım makineleri ve imalat sektöründe en yeni teknolojileri kullanarak hizmet vermeye devam eden Karahisarlı Tarım Makinaları, tarımın gelişimine katkı sağlamaktan gurur duymaktadır.
                            
                            
                            </p>
                            <a href="demo-corporate-about.html" class="btn btn-large btn-dark-gray btn-hover-animation-switch btn-box-shadow btn-rounded me-25px xs-me-0">
                                <span>
                                    <span class="btn-text">İncele</span>
                                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                                </span>
                            </a>
                            <span class="text-dark-gray fw-700 ls-minus-05px d-block d-sm-inline-block sm-mt-15px"><a href="tel:{{config('site.firma_telefon')}} "><i class="feather icon-feather-phone-call me-10px"></i>{{config('site.firma_telefon')}} </a></span>
                       
                       
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- end section -->
       
            <div style="width: 1px; height: 1px; position: absolute; overflow: hidden">

                @foreach (kelimeler() as $kelime)
                    @foreach (sehirler() as $sehir)
                   <a href="{{route('front.tarim-makinalari',['slug1' => $kelime->url,'slug2' => $sehir->url, ])}}" >   {{ $kelime->alanAdi }}   </a>
                     @endforeach
                @endforeach
  
  
  
  
            </div>
            <!-- start section -->
            <section class="overflow-hidden bg-regal-blue position-relative border-radius-6px lg-border-radius-0px z-index-0">
                <img src="{{asset('uploads/vdotnet.png')}}" class="position-absolute top-minus-150px left-minus-30px z-index-minus-1" data-bottom-top="transform: rotate(0deg) translateY(0)" data-top-bottom="transform:rotate(-20deg) translateY(0)" alt="" />
                <div class="container">
                    <div class="row align-items-center mb-6 sm-mb-9 text-center text-lg-start">
                        <div class="col-lg-5 md-mb-20px">
                            <span class="ps-25px pe-25px mb-10px text-uppercase text-white fs-13 lh-42px fw-600 border-radius-100px bg-gradient-blue-whale-transparent d-inline-block">
                              KARAHİSARLI TARIM  </span>
                            <h3 class="text-white fw-700 mb-0 ls-minus-1px">Ürünlerimizi İnceleyin</h3>
                        </div>
                        <div class="col-lg-5 last-paragraph-no-margin md-mb-20px">
                            <p class="w-85 md-w-100">   
                                Ürünlerimiz hakkında detaylı bilgi almak veya herhangi bir sorunuz için bizimle iletişime 
                                geçmekten çekinmeyin. Ekibimiz, ihtiyaçlarınıza en iyi şekilde yanıt verebilmek için burada.
                            </p>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-center justify-content-lg-end">
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 icon-extra-medium text-white swiper-button-prev slider-navigation-style-04 border border-1 border-color-transparent-white-light">
                                <i class="feather icon-feather-chevron-left"></i>
                            </div>
                            <div class="slider-one-slide-next-1 icon-extra-medium text-white swiper-button-next slider-navigation-style-04 border border-1 border-color-transparent-white-light">
                                <i class="feather icon-feather-chevron-right"></i>
                            </div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                    <div class="row align-items-center mb-6">
                        <div class="col-12">
                            <div class="outside-box-right-25 sm-outside-box-right-0">
                                <div class="swiper magic-cursor slider-one-slide" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                                    <div class="swiper-wrapper">
                                   
                                   
                                        @foreach( getAllProducts() as $kategori)

                                   
                                        <!-- start slider item -->
                                        <div class="swiper-slide">
                                            <!-- start interactive banner item -->
                                            <div class="interactive-banner-style-09 border-radius-6px overflow-hidden position-relative">
                                                <img src="{{asset($urunResimler[$kategori->parentId][0])}}" alt="" />
                                                <div class="opacity-extra-medium bg-gradient-dark-transparent"></div>
                                                <div class="image-content h-100 w-100 ps-15 pe-15 pt-13 pb-13 md-p-10 d-flex justify-content-bottom align-items-start flex-column">
                                                  
                                                    <!--
                                                    <div class="hover-label-icon position-relative z-index-9">
                                                        <div class="label bg-base-color fw-600 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 ls-05px">...</div> 
                                                        <i class="line-icon-Medal-2 text-white icon-extra-large"></i>
                                                    </div>
                                                -->

                                                    <div class="mt-auto d-flex align-items-start w-100 z-index-1 position-relative overflow-hidden flex-column">
                                                        <span class="text-white fw-600 fs-20">{{ $kategori->baslik }}</span>
                                                        <span class="content-title text-white fs-13 fw-500 text-uppercase ls-05px">Karahisarlı Tarım</span>
                                                        <a href="{{route('front.urundetay',['id' => $kategori->url])}}" class="content-title-hover fs-13 lh-24 fw-500 ls-05px text-uppercase text-white opacity-6 text-decoration-line-bottom">
                                                            Karahisarlı Tarım</a>
                                                        <span class="content-arrow lh-42px rounded-circle bg-white w-50px h-50px ms-20px text-center"><i class="fa-solid fa-chevron-right text-dark-gray fs-16"></i></span>
                                                    </div>
                                                    <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-regal-blue-transparent opacity-9">
                                                    </div>
                                                    <div class="box-overlay bg-gradient-base-color-transparent"></div>
                                                    <a href="{{route('front.urunler',['id' => $kategori->url])}}" class="position-absolute z-index-1 top-0px left-0px h-100 w-100"></a>
                                                </div>
                                            </div>
                                            <!-- end interactive banner item -->
                                        </div>
                                        <!-- end slider item -->
                                     
                                        @endforeach
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
             
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="bi bi-envelope text-white d-inline-block align-middle icon-extra-medium me-10px md-m-5px"></i>
                            <div class="fs-18 text-white d-inline-block align-middle">
                                Tarımda en verimli çözümleri bulmak için zaman ve enerji harcamayın. 
                                
                                <a href="{{route('front.iletisim')}}" class="text-white text-decoration-line-bottom">Şimdi bizimle iletişime geçin </a>
                                ve size yardımcı olalım!
                            </div>
                     
                            </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
            <!-- start section -->
            <section>
                <div class="container position-relative">
                    <div class="row align-items-center mb-7">
                        <div class="col-xxl-4 col-lg-5 md-mb-15 sm-mb-20 text-center text-lg-start">
                            <span class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-block">
                              Karahisarlı Tarım</span>
                            <h3 class="text-dark-gray fw-700 ls-minus-2px mb-40px">Tarımda Teknolojiyle Buluşun!</h3>
                            <div class="row row-cols-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                <!-- start process step item -->
                                <div class="col-12 process-step-style-05 position-relative hover-box">
                                    <div class="process-step-item d-flex">
                                        <div class="process-step-icon-wrap position-relative">
                                            <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-red fw-700 position-relative">
                                                <span class="number position-relative z-index-1 text-dark-gray">01</span>
                                                <div class="box-overlay bg-base-color rounded-circle"></div>
                                            </div>
                                            <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                                        </div>
                                        <div class="process-content ps-30px last-paragraph-no-margin mb-30px">
                                            <span class="d-block fw-700 text-dark-gray mb-5px fs-18">Ar-Ge</span>
                                            <p class="w-90 lg-w-100 lh-32">Sürdürülebilir tarım için AR-GE çalışmalarımız devam ediyor!</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end process step item -->
                                <!-- start process step item -->
                                <div class="col-12 process-step-style-05 position-relative hover-box">
                                    <div class="process-step-item d-flex">
                                        <div class="process-step-icon-wrap position-relative">
                                            <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-red fw-700 position-relative">
                                                <span class="number position-relative z-index-1 text-dark-gray">02</span>
                                                <div class="box-overlay bg-base-color rounded-circle"></div>
                                            </div>
                                            <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                                        </div>
                                        <div class="process-content ps-30px last-paragraph-no-margin mb-30px">
                                            <span class="d-block fw-700 text-dark-gray mb-5px fs-18">Üretim</span>
                                            <p class="w-90 lg-w-100 lh-32">Geleceğin üretimini şimdi şekillendiriyoruz</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end process step item -->
                                <!-- start process step item -->
                                <div class="col-12 process-step-style-05 position-relative hover-box xs-mb-30px">
                                    <div class="process-step-item d-flex">
                                        <div class="process-step-icon-wrap position-relative">
                                            <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-red fw-700 position-relative">
                                                <span class="number position-relative z-index-1 text-dark-gray">03</span>
                                                <div class="box-overlay bg-base-color rounded-circle"></div>
                                            </div>
                                        </div>
                                        <div class="process-content ps-30px last-paragraph-no-margin">
                                            <span class="d-block fw-700 text-dark-gray mb-5px fs-18">Kalite</span>
                                            <p class="w-90 lg-w-100 lh-32">Güvenilirlik ve kaliteyi bir arada sunuyoruz!.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end process step item -->
                            </div>
                        </div>
                        <div class="col-lg-7 offset-xxl-1 position-relative md-mb-30px sm-mb-15"
                             data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <img src="https://via.placeholder.com/675x560" class="position-relative z-index-9 top-40px" alt="">
                            <img src="images/demo-corporate-03.png" class="absolute-middle-center xs-w-95" alt="">
                            <img src="https://via.placeholder.com/144x64" class="position-absolute top-50px left-0px xs-left-15px"
                                 data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
                                 alt="">
                            <img src="https://via.placeholder.com/67x34" class="position-absolute top-150px left-30"
                                 data-bottom-top="transform: translateY(30px)" data-top-bottom="transform: translateY(-30px)"
                                 alt="">
                            <img src="https://via.placeholder.com/61x30" class="position-absolute top-50px right-30"
                                 data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
                                 alt="">
                            <img src="https://via.placeholder.com/93x45"
                                 class="position-absolute top-100px right-0px xs-right-15px"
                                 data-bottom-top="transform: translateY(30px)" data-top-bottom="transform: translateY(-30px)"
                                 alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 text-center align-items-center" data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                          <!--  <div class="bg-base-color fw-700 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 me-10px sm-m-5px d-inline-block align-middle">
                                ---</div> -->
                            <div class="fs-18 fw-500 text-dark-gray d-inline-block align-middle">Bir projeniz mi var <a href="{{route('front.iletisim')}}" class="text-dark-gray text-decoration-line-bottom fw-700"> bize ulaşın</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
           
            <!-- start section -->
            <section class="p-0">
                <div class="container">
                    <div class="row justify-content-center" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="col-12">
                            <div class="border-radius-6px h-450px md-h-350px sm-h-400px d-flex flex-wrap align-items-center justify-content-center overflow-hidden cover-background box-shadow-quadruple-large pt-15" style="background-image: url('https://via.placeholder.com/1315x450')">
                                <div class="opacity-full-dark bg-gradient-regal-blue-transparent"></div>
                                <div class="row justify-content-center m-0">
                                    <div class="col-lg-7 col-md-8 z-index-1 text-center text-md-start sm-mb-20px">
                                        <h3 class="text-white mb-0 fw-400 fancy-text-style-4">Karahisarlı Tarım 

                                            <span class="fw-600" data-fancy-text='{ "effect": "rotate", "string": ["tanıtım filmi ", "tanıtım filmi ", "tanıtım filmi "] }'></span>


                                        </h3>
                                    </div>
                                    <div class="col-md-2 position-relative z-index-1 text-center sm-mb-20px">
                                        <a href="https://www.youtube.com/watch?v=cfXHhfNy7tU" class="position-relative d-inline-block text-center border border-2 border-color-white rounded-circle video-icon-box video-icon-large popup-youtube">
                                            <span>
                                                <span class="video-icon">
                                                    <i class="fa-solid fa-play fs-20 text-white"></i>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="w-100 text-center position-relative mt-auto pt-20px pb-25px ps-15px pe-15px border-top border-color-transparent-white-light">
                                    <div class="fs-14 text-uppercase text-white fw-600 ls-05px">BİZİMLE GÖRÜŞMEDEN  <a href="{{route('front.iletisim')}}" class="text-decoration-line-bottom text-white">KARAR VERMEYİN</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
          
            <!-- start section -->
            <section class="bg-gradient-quartz-white border-radius-6px lg-border-radius-0px pb-0">
                <div class="container">
                    <div class="row justify-content-center mb-3">
                        <div class="col-lg-7 text-center"
                             data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <h3 class="text-dark-gray fw-700 ls-minus-1px">Bizden Haberler  </h3>
                        </div>
                    </div>
                    <div class="row mb-5 sm-mb-7">
                        <div class="col-12">
                            <ul class="blog-grid blog-wrapper grid-loading grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                <li class="grid-sizer"></li>
                            
                            
                                @foreach($haberler as $haber)
                                @php
                                $resim = reset($resimler[$haber->parentId]);  
                                $resimUrl = asset($resim);  
                                @endphp
                            
                                <!-- start blog item -->
                                <li class="grid-item">
                                    <div class="card border-0 border-radius-5px box-shadow-quadruple-large box-shadow-quadruple-large-hover">
                                        <div class="blog-image">
                                            <a href="{{route('front.haberdetay',['id' => $haber->url ])}}" class="d-block"><img src="{{asset($resimUrl)}}" alt="" /></a>
                                            
                                        </div>
                                        <div class="card-body p-12 lg-p-10">
                                            <a href="{{route('front.haberdetay',['id' => $haber->url ])}}" class="card-title mb-15px fw-700 fs-19 text-dark-gray d-inline-block w-90 md-w-100">
                                                {{ $haber->baslik }}</a>
                                                @php
                                                $aciklama = substr(strip_tags($haber->aciklama),0,60) ;  
                                                
                                              @endphp
                                             <p> {!! $aciklama !!}   </p>
                                            
                                        </div>
                                    </div>
                                </li>
                                <!-- end blog item -->
                          
                              


                                @endforeach
                               






                            </ul>
                        </div>
                    </div>
                  
                </div>
            </section>
            <!-- end section -->
@endsection




@section('getJs') 
 
@endsection