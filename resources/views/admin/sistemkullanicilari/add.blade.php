@extends('admin.layouts.master')

@section('title')
Sistem Kullanıcıları 
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sistem Kullanıcıları  /</span> Yeni  Ekle  </h4>

            <div class="row">
                <div class="col-md-12">


                    <div class="card">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.sistemkullanicilari.save') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="firmaadi" class="form-label">Firma Adı   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firmaadi"
                                            name="firmaadi"
                                            placeholder="Firma Adı"
                                            autofocus  required
                                            autocomplete="off"
                                        />
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="firmaemail" class="form-label">Firma Email   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firmaemail"
                                            name="firmaemail"
                                            placeholder="Firma Email"
                                            autocomplete="off"
                                        />
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="firmatelefon" class="form-label">Firma Telefon   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firmatelefon"
                                            name="firmatelefon"
                                            placeholder="Firma Telefon"
                                            autocomplete="off"
                                        />
                                    </div>





                                 <!--
                                    <div class="mb-3 col-md-12">
                                        <div class="card-body" style="padding:38px">
                                            <label for="" class="form-label">Marka Logosu </label>
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">

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
                                                    <input  type="hidden" name="old_logo"  value=""  />

                                                    {{--  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                -->



                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                    <a href="{{route('admin.sistemkullanicilari.index')}}" class="btn btn-outline-secondary">Geri</a>
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

