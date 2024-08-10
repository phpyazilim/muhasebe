@extends('admin.layouts.master')

@section('title')
    Marka Güncelle
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Markalar   /</span> Marka Güncelle - {{ $marka->baslik  }}  </h4>

            <div class="row">
                <div class="col-md-12">


                    <div class="card">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.marka.update',['id' => $marka->id ]) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="baslik" class="form-label">Başlık   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="baslik"
                                            name="baslik"
                                            value="{{ $marka->baslik  }}"
                                            placeholder="Başlık"
                                            autofocus  required
                                            autocomplete="off"
                                        />
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="link" class="form-label">Link   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="link"
                                            name="link"
                                            value="{{ $marka->link  }}"
                                            placeholder="Link"
                                            autofocus
                                            autocomplete="off"
                                        />
                                    </div>




                                    <div class="mb-3 col-md-12">
                                        <div class="card-body" style="padding:38px">
                                            <label for="" class="form-label">Marka Logosu  </label>
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                                <img
                                                    src="{{asset($marka->logo)}}"
                                                    alt="Marka Logosu  "
                                                    class="d-block rounded"
                                                    width="100"
                                                    id="uploadedAvatar"
                                                />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Yeni Logo Yükle</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input
                                                            type="file"
                                                            name="icon"
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
                                                    <input  type="hidden" name="old_logo"  value="{{$marka->logo}}"  />

                                                    {{--  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Güncelle</button>
                                    <a  href="{{route('admin.marka.index')}}"  class="btn btn-outline-secondary">Geri</a>
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


@endsection

