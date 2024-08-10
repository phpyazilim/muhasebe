<?php

//    print_r($menuInfo->icerik_tarih_ekle);
//    die();
?>
@extends('admin.layouts.master')

@section('title')
    Slider Ekle
@endsection
@section('css')

@endsection



@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slider  /</span> Slider Ekle  </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.slider.update',['id' => $id]) }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-xl-12">

                                <div class="nav-align-top mb-4">

                                    <ul class="nav nav-pills mb-3" role="tablist">

                                        @foreach(getLangs() as $key => $dil)

                                            <li class="nav-item">
                                                <button
                                                    id ="tab_{{ $dil->kod }}"
                                                    type="button"
                                                    class="nav-link {{  $dil->kod == 'tr' ? 'active' : '' }}"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#navs-pills-top-{{ $dil->kod }}"
                                                    aria-controls="navs-pills-top-{{ $dil->kod }}"
                                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}"
                                                    onclick="openTab(event, 'tab{{ $dil->kod }}')"
                                                >
                                                    {{ $dil->baslik }}
                                                </button>

                                            </li>
                                        @endforeach
                                    </ul>





                                    <div class="col-xl-12">

                                        @foreach(getLangs() as $keyb => $dilb)

                                            <div id="tab{{ $dilb->kod }}"   class="tabcontent" style="{{ $dilb->kod == "tr" ? 'display: block;' : 'display: none;' }} " >

                                                @if( config('site.slider_baslik_1')  == 1 )
                                                <div class="mb-3 col-md-12">
                                                    <label for="kod" class="form-label">1. Başlık   </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="baslik"
                                                        name="baslik_{{ $dilb->kod }}"
                                                        placeholder="Başlık"  required
                                                        autocomplete="off"
                                                        value="{{$dildeger[$dilb->kod]->baslik}}"
                                                    />
                                                </div>
                                                @endif


                                                @if( config('site.slider_baslik_2')  == 1)
                                                    <div class="mb-3 col-md-12">
                                                        <label for="baslik2_" class="form-label">2. Başlık </label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="baslik2_"
                                                            name="baslik2_{{ $dilb->kod }}"
                                                            placeholder="İkinci Başlık"
                                                            autocomplete="off"
                                                            value="{{$dildeger[$dilb->kod]->baslik2}}"
                                                        />
                                                    </div>
                                                @endif

                                                    @if( config('site.slider_baslik_3')  == 1)
                                                    <div class="mb-3 col-md-12">
                                                        <label for="deger1" class="form-label">3. Başlık </label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="deger1"
                                                            name="deger1_{{ $dilb->kod }}"
                                                            placeholder="İkinci Başlık"
                                                            autocomplete="off"
                                                            value="{{$dildeger[$dilb->kod]->deger1}}"
                                                        />
                                                    </div>
                                                @endif

                                                    @if( config('site.slider_button')  == 1)
                                                    <div class="mb-3 col-md-12">
                                                        <label for="deger2" class="form-label">Button Başlığı </label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="deger2"
                                                            name="deger2_{{ $dilb->kod }}"
                                                            placeholder="Button Başlığı"
                                                            autocomplete="off"
                                                            value="{{$dildeger[$dilb->kod]->deger2}}"
                                                        />
                                                    </div>
                                                @endif


                                                @if( config('site.slider_link')  == 1)
                                                    <div class="mb-3 col-md-12">
                                                        <label for="link" class="form-label">Link  </label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="link"
                                                            name="link_{{ $dilb->kod }}"
                                                            placeholder="Link"
                                                            autocomplete="off"
                                                            value="{{$dildeger[$dilb->kod]->link}}"

                                                        />
                                                    </div>
                                                @endif





                                            </div>

                                        @endforeach

                                    </div>



                                </div>



                            </div>




                                <div class="mb-3 col-md-4">
                                    <div class="card-body" style="padding:38px">
                                        <label for="" class="form-label">Resim     </label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                                src="{{$slider->resim1}}"
                                                alt="Üst Logo"
                                                class="d-block rounded"
                                                width="100"
                                                id="uploadedAvatar"
                                            />
                                            <div class="button-wrapper">
                                                <label for="uploadb" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input
                                                        type="file"
                                                        name="dosya1"
                                                        id="uploadb"
                                                        class="account-file-input"
                                                        hidden
                                                        accept="image/png, image/jpeg"
                                                    />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <input  type="hidden" name="old_resim1"  value="{{$slider->resim1}}"  />

                                                {{--    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            @if( config('site.slider_ikinci_resim')  == 1)
                                <div class="mb-3 col-md-4">
                                    <div class="card-body" style="padding:38px">
                                        <label for="" class="form-label">Resim 2   </label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                                src="{{$slider->resim2}}"
                                                alt="Üst Logo"
                                                class="d-block rounded"
                                                width="100"
                                                id="uploadedAvatar"
                                            />
                                            <div class="button-wrapper">
                                                <label for="uploadc" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input
                                                        type="file"
                                                        name="dosya2"
                                                        id="uploadc"
                                                        class="account-file-input"
                                                        hidden
                                                        accept="image/png, image/jpeg"
                                                    />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <input  type="hidden" name="old_resim2"  value="{{$slider->resim2}}"  />

                                                {{--                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif








                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.slider.index')}}" class="btn btn-outline-secondary">Geri</a>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- row -->

            </div></div>



    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
    </div>

@endsection


@section('js')




@endsection

