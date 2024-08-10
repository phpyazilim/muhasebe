@extends('admin.layouts.master')

@section('title')
    Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> Sosyal Medya</h4>

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
                                        <label for="firma_facebook" class="form-label">Facebook    &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_facebook') !!}   @endverbatim</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_facebook"
                                            name="firma_facebook"
                                            value="{{$ayarlar['firma_facebook']}}"
                                            placeholder="Facebook"
                                            autofocus  required
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="firma_instagram" class="form-label">Instagram   &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_instagram') !!}   @endverbatim </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_instagram"
                                            name="firma_instagram"
                                            value="{{$ayarlar['firma_instagram']}}"
                                            placeholder="Instagram"  required
                                        />
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="firma_youtube" class="form-label">Youtube  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_youtube') !!}   @endverbatim</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="firma_youtube"
                                            name="firma_youtube"
                                            value="{{$ayarlar['firma_youtube']}}"
                                            placeholder="Youtube"  required
                                        />
                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="firma_twitter" >Twitter  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_twitter') !!}   @endverbatim</label>

                                        <input
                                            type="text"
                                            id="firma_twitter"
                                            name="firma_twitter"
                                            class="form-control"
                                            placeholder="Twitter"
                                            value="{{$ayarlar['firma_twitter']}}"
                                            required
                                        />

                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="firma_linkedin" >Linkedin  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_linkedin') !!}   @endverbatim </label>

                                        <input
                                            type="text"
                                            id="firma_linkedin"
                                            name="firma_linkedin"
                                            class="form-control"
                                            placeholder="Linkedin"
                                            value="{{$ayarlar['firma_linkedin']}}"
                                            required
                                        />

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

