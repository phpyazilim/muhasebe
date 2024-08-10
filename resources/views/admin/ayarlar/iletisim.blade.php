@extends('admin.layouts.master')

@section('title')
    Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> İletişim Bilgileri</h4>

            <div class="row">
                <div class="col-md-12">


                    <div class="card  ">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.ayarlar.update') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                                @csrf
                                @method('put')
                                <input type="hidden" name="gidenform" value="iletisim">



                                <div class="row">



                                    <div class="mb-3 col-md-6">
                                        <label for="firma_adi" class="form-label">Firma Adı    &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_adi') !!}   @endverbatim  </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_adi"
                                            name="firma_adi"
                                            value="{{$ayarlar['firma_adi']}}"
                                            placeholder="Firma Adı"
                                            autofocus  required
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="firma_telefon" class="form-label">Telefon  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_telefon') !!}   @endverbatim  </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_telefon"
                                            name="firma_telefon"
                                            value="{{$ayarlar['firma_telefon']}}"
                                            placeholder="Telefon"  required
                                        />
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="firma_gsm" class="form-label">Gsm  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_gsm') !!}   @endverbatim </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="firma_gsm"
                                            name="firma_gsm"
                                            value="{{$ayarlar['firma_gsm']}}"
                                            placeholder="Gsm"  required
                                        />
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="firma_whatsap" >Whatsap  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_whatsap') !!}   @endverbatim </label>

                                        <input
                                            type="text"
                                            id="firma_whatsap"
                                            name="firma_whatsap"
                                            class="form-control"
                                            placeholder="Whatsap"
                                            value="{{$ayarlar['firma_whatsap']}}"
                                            required
                                        />

                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="_FIRMAEMAIL_" class="form-label">Email  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_email') !!}   @endverbatim  </label>
                                        <input   value="{{$ayarlar['firma_email']}}"  class="form-control" type="email" id="firma_email" name="firma_email" placeholder="Email" required />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="_FIRMADRES_" class="form-label">Adres  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_adres') !!}   @endverbatim </label>

                                        <textarea name="firma_adres"  class="form-control"  >{{$ayarlar['firma_adres']}}</textarea>
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

