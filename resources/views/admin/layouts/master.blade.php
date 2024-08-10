<!DOCTYPE html>

<html
  lang="tr"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title')</title>

    <meta name="description" content="" />
     @yield('csrftag')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('admin/assets/datatables.min.css')}}"  />
 
    <link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}"  />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/core.css')}}"  class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/theme-default.css')}}"  class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}"  />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"  />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"  />
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/apex-charts/apex-charts.css')}}"  />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Page CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/custom.css')}}"  />

    <!-- Helpers -->
    <script src="{{asset('admin/assets/vendor/js/helpers.js')}}" ></script>

      <script src="{{asset('admin/assets/js/config.js')}}" ></script>

      @yield('css')

 


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('admin.layouts.sidebar');

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
{{--                  <i class="bx bx-search fs-4 lh-0"></i>--}}
{{--                  <input--}}
{{--                    type="text"--}}
{{--                    class="form-control border-0 shadow-none"--}}
{{--                    placeholder="Search..."--}}
{{--                    aria-label="Search..."--}}
{{--                  />--}}
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset(Auth()->user()->avatar)}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset(Auth()->user()->avatar)}}"    class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"> {{Auth()->user()->name}} </span>
                            <small class="text-muted"> {{Auth()->user()->user_type}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('admin.users.profilimiguncelle') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profilim</span>
                      </a>
                    </li>
                  
                  <!--
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                  -->




                    <li>



                      <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();  this.closest('form').submit();" style="text-decoration: none" >
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Çıkış </span>
                        </a>
                    </form>



                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->



          @yield('content')



            @include('admin.layouts.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
{{--    <script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>--}}



    <script src="{{asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/assets/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('admin/assets/datatables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script async defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>

    <script>
       $(document).ready(function() {

      @if ($errors->any())
          @foreach ($errors->all() as $error)
              toastr.error("{{ $error }}");
          @endforeach
      @endif




    });


  </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {


      function startTutorial() {
          /*     var isMobile = window.innerWidth <= 600;
              var elements = document.querySelectorAll('.menu-int');
              
              elements.forEach(function(element) {
                  if (isMobile && element.id === 'mobileMenu') {
                      element.setAttribute('data-intro', 'Burası menüleri açıp arasında geçiş yapabileceğimiz alan.');
                  } else if (!isMobile && element.id === 'sidebar') {
                      element.setAttribute('data-intro', 'Burası menüler arasında geçiş yapabileceğimiz alan.');
                  } else {
                      element.removeAttribute('data-intro');
                  }
              });

              var elements = document.querySelectorAll('.menu-int-yardim');
              
              elements.forEach(function(element) {
                  if (isMobile && element.classList.contains('mobil-yardim')){
                      element.setAttribute('data-intro', 'Panel üzerinde yardım almak için istediğiniz zaman tıklayarak bilgi alabilirsiniz. </br></br> Eğer istediğiniz yardıma ulaşamıyorsanız lütfen Ato Medya ile iletişime geçiniz.');
                  } else if (!isMobile && element.classList.contains('desktop-yardim')){
                      element.setAttribute('data-intro', 'Panel üzerinde yardım almak için istediğiniz zaman tıklayarak bilgi alabilirsiniz. </br></br> Eğer istediğiniz yardıma ulaşamıyorsanız lütfen Ato Medya ile iletişime geçiniz.');
                  } else {
                      element.removeAttribute('data-intro');
                  }
              }); */


          introJs().setOptions({
              nextLabel: 'İleri',
              prevLabel: 'Geri',
              skipLabel: 'Tanıtımı Geç',
              doneLabel: 'Bitir',
              hidePrev: true,
              hideNext: false
          }).start();
      }

      // Kullanıcının tutorial'i görüp görmediğini kontrol et
      if (!localStorage.getItem('tutorialSeen')) {
          startTutorial();
          localStorage.setItem('tutorialSeen', 'true');
      }

      // Buton tıklama ile tutorial'i tekrar başlatma
      document.getElementById('startTutorial').addEventListener('click', function() {
          startTutorial();
      });
      document.getElementById('startTutorialDesktop').addEventListener('click', function() {
          startTutorial();
      });
  });
</script>

    @yield('js')

  </body>
</html>
