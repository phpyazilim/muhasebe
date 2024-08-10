  
@extends('admin.layouts.master')

@section('title')
     Kullanıcı Ekle 
@endsection
@section('css')

@endsection



@section('content')
 

   <!-- Content wrapper -->
   <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kullanıcılar  /</span> Kullanıcı Güncelle </h4>

      <div class="row">
        <div class="col-md-12">
          
      
          <div class="card  ">
          
            <div class="card-body my-3">
              <form  action="{{ route('admin.users.update', ['id' => $id]) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                 @csrf
                 @method('put')
             <input type="hidden" name="gelenForm" value="profil">
                    <h5 class="card-header">Profil  Detayı </h5>
                    <!-- Account -->
                    <div class="card-body" style="padding:38px">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{asset($user->avatar)}}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Yeni Yükle</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              name="avatar"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <input  type="hidden" name="old_avatar"  value="{{ $user->avatar }}"  /> 

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>


                <div class="row">



                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Ad Soyad</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="name"
                      value="{{ $user->name }}"
                      autofocus
                    />
                  </div>
                 
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{ $user->email }}"
                      placeholder="john.doe@example.com"
                    />
                  </div>
               
                  <div class="mb-3 col-md-6">
                    <label for="phone" class="form-label">Telefon</label>
                    <input
                      type="text"
                      class="form-control"
                      id="phone"
                      name="phone"
                      value="{{ $user->phone }}"
                    />
                  </div>

 
                  <div class="col-md-6 mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Yetki Seçiniz    </label>
                    <select name="yetki_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                       
                        @foreach(getAllYetki() as $menu)
                            <option value="{{ $menu->id }}"   @if($menu->id == $user->yetki_id) selected @endif >{{ $menu->baslik }}</option>
                        @endforeach

                    </select>
                </div>
              
                
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                  <a href="{{route('admin.users.index')}}" class="btn btn-outline-secondary">Geri</a>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>



          

          <div class="card mt-3">
            <h5 class="card-header">Şifreyi Güncelle</h5>
            <div class="card-body">
              <div class="mb-3 col-12 mb-0">
                
              </div>
             
              
                <form  action="{{ route('admin.users.update', ['id' => $id]) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                  @csrf
                  @method('put')
                  <input type="hidden" name="gelenForm" value="sifre">
                  
               <div class="row">
                 <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Yeni Şifre</label>
                    <input  class="form-control" type="password" id="password" name="password"  />
                  </div>
                
                  <div class="mb-3 col-md-6">
                    <label for="password_confirmation" class="form-label">Yeni Şifre Tekrar </label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"  />
                  </div>
               </div>
                 



                  <button type="submit" class="btn btn-primary me-2">Güncelle</button> 
                  <a href="{{route('admin.users.index')}}" class="btn btn-outline-secondary">Geri</a>

              </form>
            </div>
          </div>


 
 

        </div>
      </div>
    </div>
    <!-- / Content -->
 
   

    <div class="content-backdrop fade"></div>
    </div>

@endsection





@section('js')

<script>
    $(document).ready(function() {   
      
      $("#uploadedAvatar").attr('src','{{ asset($user->avatar) }}');
   
   
  
     });
  
  </script>
  
  <script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>
  <script src="{{asset('admin/assets/js/pages-account-settings-account.js')}}"></script>
  
   


@endsection

