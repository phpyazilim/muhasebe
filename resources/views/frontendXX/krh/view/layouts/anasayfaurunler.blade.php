     <!-- start section -->
     <section class="overflow-hidden   position-relative border-radius-6px lg-border-radius-0px z-index-0">
       
        <div class="container">
            <div class="row align-items-center mb-6 sm-mb-9 text-center text-lg-start">
             
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

                                @if(isset($sehir) && isset($kelime))
                                <div style="width: 1px; height:1px; overflow:hidden; position: absolute;">
                                  <h1>{{ $sehir }} - {{ $kelime }}</h1>
                                </div>
                                @endif
                                <!-- start slider item -->
                                <div class="swiper-slide">
                                    <!-- start interactive banner item -->
                                    <div class="interactive-banner-style-09 border-radius-6px overflow-hidden position-relative">
                                        <img src="{{ asset(isset($urunResimler[$kategori->parentId][0]) ? $urunResimler[$kategori->parentId][0] : '') }}" alt="" />
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
                                                <span class="content-title text-white fs-13 fw-500 text-uppercase ls-05px">KARAHİSARLI TARIM</span>
                                                <a href="{{route('front.urundetay',['id' => $kategori->url])}}" class="content-title-hover fs-13 lh-24 fw-500 ls-05px text-uppercase text-white opacity-6 text-decoration-line-bottom">
                                                    Karahisarlı Tarım</a>
                                                <span class="content-arrow lh-42px rounded-circle bg-white w-50px h-50px ms-20px text-center"><i class="fa-solid fa-chevron-right text-dark-gray fs-16"></i></span>
                                            </div>
                                            <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-regal-blue-transparent opacity-9">
                                            </div>
                                            <div class="box-overlay bg-gradient-base-color-transparent"></div>
                                            <a href="{{route('front.urundetay',['id' => $kategori->url])}}" class="position-absolute z-index-1 top-0px left-0px h-100 w-100"></a>
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
     
     
            
        </div>
    </section>
    <!-- end section -->