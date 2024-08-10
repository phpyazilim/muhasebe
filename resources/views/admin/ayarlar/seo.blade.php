@extends('admin.layouts.master')

@section('title')
    Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> Seo Ayarları</h4>

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
                                        <label for="firma_title" class="form-label">Title   &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_title') !!}   @endverbatim </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_title"
                                            name="firma_title"
                                            value="{{$ayarlar['firma_title']}}"
                                            placeholder="Title"
                                            autofocus  required
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="firma_description" class="form-label">Description  &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_description') !!}   @endverbatim</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firma_description"
                                            name="firma_description"
                                            value="{{$ayarlar['firma_description']}}"
                                            placeholder="Description"  required
                                        />
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="firma_keyword" class="form-label">Keyword   &nbsp;&nbsp;&nbsp;     @verbatim  {!! config('site.firma_keyword') !!}   @endverbatim</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="firma_keyword"
                                            name="firma_keyword"
                                            value="{{$ayarlar['firma_keyword']}}"
                                            placeholder="Keyword"  required
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

