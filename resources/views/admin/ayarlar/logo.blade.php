@extends('admin.layouts.master')

@section('title')
    Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> Logo</h4>

            <div class="row">
                <div class="col-md-12">


                    <div class="card  ">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.ayarlar.update') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                                @csrf
                                @method('put')
                                <input type="hidden" name="gidenform" value="logo">

                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <div class="card-body" style="padding:38px">
                                            <label for="" class="form-label">Üst Logo   &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_ustlogo') !!}   @endverbatim </label>
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                                <img
                                                    src="{{asset($ayarlar['firma_ustlogo'])}}"
                                                    alt="Üst Logo"
                                                    class="d-block rounded"
                                                    width="100"
                                                    id="uploadedAvatar"
                                                />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Yeni Resim Yükle</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input
                                                            type="file"
                                                            name="ustlogo"
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
                                                    <input  type="hidden" name="old_ustlogo"  value="{{ $ayarlar['firma_ustlogo']  }}"  />

{{--         <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="card-body" style="padding:38px">
                                            <label for="" class="form-label">Alt Logo   &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_altlogo') !!}   @endverbatim</label>
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img
                                                    src="{{asset($ayarlar['firma_altlogo'])}}"
                                                    alt="Alt Logo"
                                                    class="d-block rounded"

                                                    width="100"
                                                    id="uploadedAvatar"
                                                />
                                                <div class="button-wrapper">
                                                    <label for="uploadb" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Yeni Resim Yükle</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input
                                                            type="file"
                                                            name="altlogo"
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
                                                    <input  type="hidden" name="old_altlogo"  value="{{ $ayarlar['firma_altlogo']  }}"  />

{{--                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>










                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                    <button type="reset" class="btn btn-outline-secondary">Vazgeç</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
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


        });

    </script>



@endsection

