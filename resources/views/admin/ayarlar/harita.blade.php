@extends('admin.layouts.master')

@section('title')
   Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> Harita Bilgileri</h4>

            <div class="row">
                <div class="col-md-12">


                    <div class="card  ">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.ayarlar.update') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                                @csrf
                                @method('put')
                                <input type="hidden" name="gidenform" value="iletisim">

                                <div class="row">



                                    <div class="mb-3 col-md-12">
                                        <label for="firma_harita" class="form-label">Harita  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_harita') !!}   @endverbatim </label>

                                        <textarea name="firma_harita"  class="form-control" rows="8" >{{$ayarlar['firma_harita']}}</textarea>
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

