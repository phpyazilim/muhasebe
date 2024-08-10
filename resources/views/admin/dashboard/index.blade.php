@extends('admin.layouts.master')

@section('title')
Anasayfa
@endsection


@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">

      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Hoşgeldin {{Auth()->user()->name}} 🎉</h5>
              <p class="mb-4">
                  
              </p>

              <a href="{{ route('admin.users.profilimiguncelle') }}" class="btn btn-sm btn-outline-primary">Bilgilerini güncellemek için tıkla </a>
              

            {{--   <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();   this.closest('form').submit();" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Çıkış    </div>
            </a>
            </form> --}}



            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="{{asset('admin/assets/img/illustrations/man-with-laptop-light.png')}}"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>



        </div>
      </div>
    </div>
 
   <!--  
   <div class="content-wrapper">
 

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-8 mb-4 order-0">

            </div>
          </div>
        </div>

 -->

 <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menüler /</span> Hızlı Erişim </h4>

  <div class="d-flex flex-wrap" id="icons-container">




@foreach(getAllMenu() as $menu)

<a href="{{ route('admin.icerik.index', ['id' => $menu->parentId ])  }}" class="menu-link" style="color:black">

  <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
    <div class="card-body">
      <i class="fa  fa-bars" style="margin: 0 10px 0 0"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">{{$menu->baslik}} </p>
    </div>
  </div>
</a>



@endforeach


</div>    </div>





@endsection
