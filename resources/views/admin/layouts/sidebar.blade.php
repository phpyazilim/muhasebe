@php

    $menuler =  getAllMenu();



@endphp

 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('admin.dashboard.index') }}" class="app-brand-link">

        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1"  data-title="Panel Menüleri " data-intro="Panelde tüm işlemlerinizi bu menüden yapabilirsiniz" data-step="1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
            <i class="fa  fa-home" style="margin: 0 10px 0 0"></i>
          <div data-i18n="Analytics">Anasayfa    </div>
        </a>
      </li>



  

       @if(isActiveUserYetki("tasarimayar"))
        

        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="fa fa-wrench" style="margin: 0 10px 0 0"></i>
            <div data-i18n="Layouts"> Web Master </div>
          </a>
         
  
          <ul class="menu-sub">
           
           
            <li class="menu-item">
              <a href="{{ route('admin.ayarlar.tasarim') }}" class="menu-link">
                <div data-i18n="Without menu">Tasarım Ayarları</div>
              </a>
            </li>
          
           
           
            <li class="menu-item">
              <a href="{{ route('admin.files.index') }}" class="menu-link">
                <div data-i18n="Without menu"> Dosyalar  </div>
              </a>
            </li>
          
           
              
            
           
  
  
  
  
          </ul>
        </li>



        @endif


        @if(isActiveUserYetki("ayarlar"))
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="fa fa-wrench" style="margin: 0 10px 0 0"></i>
          <div data-i18n="Layouts"> Ayarlar </div>
        </a>
       

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.iletisim') }}" class="menu-link">
              <div data-i18n="Without menu">İletişim Bilgileri</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.logo') }}" class="menu-link">
              <div data-i18n="Without navbar">Logo</div>
            </a>
          </li>
            <li class="menu-item">
                <a href="{{ route('admin.ayarlar.seo') }}" class="menu-link">
                    <div data-i18n="Blank">Seo Ayarları  </div>
                </a>
            </li>
          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.harita') }}" class="menu-link">
              <div data-i18n="Container">Harita</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.sosyal') }}" class="menu-link">
              <div data-i18n="Fluid">Sosyal Medya</div>
            </a>

          </li>

          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.analytics') }}" class="menu-link">
              <div data-i18n="Blank">Google Analytics  </div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{ route('admin.ayarlar.kod') }}" class="menu-link">
              <div data-i18n="Blank"> Css/Js Kod Ekle </div>
            </a>
          </li>




        </ul>
      </li>
      @endif



      @if(isActiveUserYetki("diller"))
        <li class="menu-item">
            <a href="{{ route('admin.lang.index') }}" class="menu-link">
                <i class="fa  fa-globe" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Diller</div>
            </a>
        </li>
        @endif


      @if(isActiveUserYetki("translate"))
        <li class="menu-item">
            <a href="{{ route('admin.translate.index') }}" class="menu-link">
                <i class="fa  fa-language" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Translate</div>
            </a>
        </li>
        @endif


        @if(isActiveUserYetki("menu"))
        <li class="menu-item">
            <a href="{{ route('admin.menu.index') }}" class="menu-link">
                <i class="fa  fa-bars" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Menu</div>
            </a>
        </li>
        @endif

        @if(isActiveUserYetki("iceriksayfalar"))
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa  fa-file" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">İçerik Sayfaları </div>
            </a>
          


            <ul class="menu-sub">

                @foreach($menuler as $menu)
                <li class="menu-item">
                    <a href="{{ route('admin.icerik.index', ['id' => $menu->parentId ])  }}" class="menu-link">
                        <div data-i18n="Without menu">{{$menu->baslik}} </div>
                    </a>
                </li>
                @endforeach

            </ul>
        </li>
        @endif


        @if(isActiveUserYetki("slider"))
        <li class="menu-item">
            <a href="{{ route('admin.slider.index') }}" class="menu-link">
                <i class="fa  fa-images" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Slider</div>
            </a>
        </li>
        @endif

        @if(isActiveUserYetki("kategoriler"))
        @if ( config('site.categories_kullan') == 1)
        <li class="menu-item">
            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                <i class="fa  fa-images" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Kategoriler</div>
            </a>
        </li>
        @endif
        @endif

        @if(isActiveUserYetki("markalar"))
        <li class="menu-item">
            <a href="{{ route('admin.marka.index') }}" class="menu-link">
                <i class="fa  fa-images" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Markalar</div>
            </a>
        </li>
        @endif

        @if(isActiveUserYetki("urunler"))
        <li class="menu-item">
            <a href="{{ route('admin.product.index') }}" class="menu-link">
                <i class="fa  fa-images" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Ürünler</div>
            </a>
        </li>
        @endif


        @if(isActiveUserYetki("yetkiler"))
        <li class="menu-item">
            <a href="{{ route('admin.yetki.index') }}" class="menu-link">
                <i class="fa  fa-images" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Yetkiler</div>
            </a>
        </li>
        @endif


        @if(isActiveUserYetki("kullanicilar"))
        <li class="menu-item">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="fa  fa-users" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Kullanıcılar</div>
            </a>
        </li>
        @endif


        @if(isActiveUserYetki("sistemkullanicilari"))
        <li class="menu-item">
            <a href="{{ route('admin.sistemkullanicilari.index') }}" class="menu-link">
                <i class="fa  fa-users" style="margin: 0 10px 0 0"></i>
                <div data-i18n="Layouts">Sistem Kullanıcıları</div>
            </a>
        </li>
        @endif



{{--        <li class="menu-item">--}}
{{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Ürün Yönetimi </div>--}}
{{--            </a>--}}

{{--        <ul class="menu-sub">--}}

{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Without navbar">Markalar</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Container">Kategoriler</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Fluid">Ürünler  </div>--}}
{{--                </a>--}}

{{--            </li>--}}


{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Blank">Varyasyonlar </div>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Blank">Varyasyonlar </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Blank">İndirim Kuponu </div>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--        </li>--}}

{{--        <li class="menu-item">--}}
{{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Sipariş Yönetimi </div>--}}
{{--            </a>--}}

{{--        <ul class="menu-sub">--}}

{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Without navbar">Satışlar</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Container">Arşivdeki Satışlar</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Fluid">Sipariş Durumları  </div>--}}
{{--                </a>--}}

{{--            </li>--}}


{{--            <li class="menu-item">--}}
{{--                <a href="#" class="menu-link">--}}
{{--                    <div data-i18n="Blank">Kargo Ayarları </div>--}}
{{--                </a>--}}
{{--            </li>--}}



{{--        </ul>--}}
{{--        </li>--}}
{{-- --}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Sayfa Modulleri</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Sayfalar  </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{-- --}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Üyeler  </div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Kullanıcılar  </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{-- --}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Yetkiler  </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{-- --}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Yorumlar  </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{-- --}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Mesajlar  </div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Katalog  </div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-item">--}}
{{--            <a href="#" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-layout"></i>--}}
{{--                <div data-i18n="Layouts">Mail Listesi  </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--   --}}

        <li class="menu-item">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();   this.closest('form').submit();" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Çıkış    </div>
            </a>
            </form>
        </li>



             <li class="menu-item msgoster"> 
             <a href="#" id="startTutorial"  class="menu-link   " style="font-weight: bold"> 
              <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Layouts" >Yardım    </div> 
            </a> 
          </li> 


     
        
    




{{--      <li class="menu-header small text-uppercase">--}}
{{--        <span class="menu-header-text">Ürün Yönetimi </span>--}}
{{--      </li>--}}










{{--      <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>--}}


    </ul>
  </aside>
  <!-- / Menu -->
