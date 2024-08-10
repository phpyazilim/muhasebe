<!-- Footer -->
<section class="footer-section">
    <div class="partner-section"> 
        <div class="container">
            <div class="partner">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <figure class="mb-0 partner1">
                            <img class="img-fluid" src="./assets/images/partner-logo-1.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="mb-0 partner1 partner2">
                            <img class="img-fluid" src="./assets/images/partner-logo-2.png" alt="">
                        </figure>
                    </li>
                    <li class="img-mb">
                        <figure class="mb-0 partner1 partner3">
                            <img class="img-fluid" src="./assets/images/partner-logo-3.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="mb-0 partner1 partner4">
                            <img class="img-fluid" src="./assets/images/partner-logo-4.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="mb-0 partner1 partner5">
                            <img class="img-fluid" src="./assets/images/partner-logo-5.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="mb-0 partner1 partner5">
                            <img class="img-fluid" src="./assets/images/partner-logo-6.png" alt="">
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="middle-portion">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                    <a href="./index.html">
                        <figure class="footer-logo">
                            <img src="{{config('site.firma_altlogo')}}" class="img-fluid" alt="">
                        </figure>
                    </a>
                    <p class="text-size-16 footer-text">  {{getIcerikByIcerikId(20)->kisaaciklama}} </p>
                    <figure class="mb-0 payment-icon">
                        <img src="./assets/images/payment-card.png" class="img-fluid" alt="">
                    </figure>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-12 col-12 d-lg-block d-none">

                </div>
                <div class="col-lg-2 col-md-3 col-sm-12 col-12 d-md-block d-none">
                    <div class="links">
                        <h4 class="heading">Hızlı Menü</h4>
                        <hr class="line">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{route('front.home')}}" class=" text-size-16 text text-decoration-none">Anasayfa</a></li>
                            @foreach(getAllIcerikByParentId(1 ) as $kurumsal)

                            <li><a  class="text-size-16 text text-decoration-none" href="{{route('front.icerik',['id' => $kurumsal->url ])}}"> {{ $kurumsal->baslik }}  </a></li>
                            
                            @endforeach
                            <li><a href="{{route('front.blog')}}" class=" text-size-16 text text-decoration-none">Blog  </a></li>
                            <li><a href="{{route('front.iletisim')}}" class=" text-size-16 text text-decoration-none">İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 d-lg-block d-none">
                    <div class="links">
                        <h4 class="heading">Menü</h4>
                        <hr class="line">
                        <ul class="list-unstyled mb-0">

                            <li><a href="{{route('front.paketler')}}" class=" text-size-16 text text-decoration-none">Paketler</a></li>
                            <li><a href="{{route('front.resimgaleri')}}" class=" text-size-16 text text-decoration-none">Resim Galeri</a></li>
                            <li><a href="{{route('front.videogaleri')}}" class=" text-size-16 text text-decoration-none">Video Galeri</a></li>
                           
                            <li><a href="{{route('front.referans')}}" class=" text-size-16 text text-decoration-none">Referanslar</a></li>
                        
                            <li><a href="{{route('front.basvurustep1')}}" class=" text-size-16 text text-decoration-none">Başvuru</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-sm-block">
                    <div class="icon">
                        <h4 class="heading">Bize Ulaşın</h4>
                        <hr class="line">
                        <ul class="list-unstyled mb-0">
                            <li class="text-size-16 text">Adres: <a href="javascript:{}" class="mb-0 text text-decoration-none text-size-16">{{config('site.firma_adres')}}</a></li>
                            <li class="text-size-16 text">Email: <a href="mailto:{{config('site.firma_email')}}" class="mb-0 text text-decoration-none text-size-16">{{config('site.firma_email')}}</a></li>
                            <li class="text-size-16 text">Phone: <a href="tel:{{config('site.firma_telefon')}}" class="mb-0 text text-decoration-none text-size-16">{{config('site.firma_telefon')}}</a></li>
                            <li class="text-size-16 text1">Fax: <a href="tel:{{config('site.firma_gsm')}}" class="mb-0 text text-decoration-none text-size-16">{{config('site.firma_gsm')}}</a></li>
                            <li class="social-icons">
                                <div class="circle"><a href="{{config('site.firma_facebook')}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></div>
                                <div class="circle"><a href="{{config('site.firma_twitter')}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></div>
                                <div class="circle"><a href="{{config('site.firma_instagram')}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></div>
                                <div class="circle"><a href="{{config('site.firma_youtube')}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--footer area-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-size-16">Copyright @<?=date("Y")?>  {{config('site.firma_title') }} </p>
            </div>
        </div>
    </div>
</div>

