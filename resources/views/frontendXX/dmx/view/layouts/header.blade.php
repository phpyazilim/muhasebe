<!--Header-->
<header class="header">
    <div class="container">
        <nav class="navbar position-relative navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('front.home')}}"><figure class="mb-0"><img src="{{config('site.firma_ustlogo')}}" alt="" class="img-fluid"></figure></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('front.home')}}">Anasayfa</a>
                    </li>
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> Kurumsal </a>
                        <div class="dropdown-menu drop-down-content">
                            <ul class="list-unstyled drop-down-pages">

                                @foreach(getAllIcerikByParentId(1 ) as $kurumsal)

                                <li  class="nav-item"><a  class="dropdown-item nav-link" href="{{route('front.icerik',['id' => $kurumsal->url ])}}"> {{ $kurumsal->baslik }}  </a></li>
                                
                                @endforeach

  
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.paketler')}}">Paketler</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> Galeri </a>
                        <div class="dropdown-menu drop-down-content">
                            <ul class="list-unstyled drop-down-pages">
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{route('front.resimgaleri')}}">Resim Galeri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{route('front.videogaleri')}}">Video  Galeri</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.referans')}}">Referanslar    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.blog')}}">Blog  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.iletisim')}}">İletişim  </a>
                    </li>

                    
                      
                    <li class="nav-item">
                        <a class="nav-link signup" href="{{route('front.basvurustep1')}}"><i class="fa-solid fa-user-lock"></i>Başvuru Yap</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

