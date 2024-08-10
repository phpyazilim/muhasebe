@extends('admin.layouts.master')


@section('title')
    Site Ayarları
@endsection


@section('csrftag')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold py-3 mb-4 text-left" ><span class="text-muted fw-light">Çeviriler /</span> Tüm Çeviriler</h4>
                </div>
                <div class="col-md-6 " style="  text-align: right; padding-top: 15px">
                    <a href="{{ route('admin.translate.add' ) }}" class="btn btn-primary "   data-title="Yeni Ekle" data-intro="Buradan ekleme işlemi yapabilirsiniz" data-step="2">Yeni Ekle</a>
                </div>



                <div class="col-md-12">

                    <div class="card  ">

                        <div class="card-body my-3">

                            <div class="row">
                                <div class="mb-3 col-md-12">




                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%">Constant</th>
                                                <th style="width: 70%">Başlık</th>

                                                <th style="width: 10%">İşlem</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0 sortable  " data-url="{{route('admin.lang.ranksetter')}}" >

                                            @foreach($results as $dil)

                                                <tr  >
                                                    <td> <strong>{{ $dil->url }}</strong></td>
                                                    <td>{{ $dil->baslik }}</td>

                                                    <td>

                                                        <div style="display: flex; align-items: center;">
                                                            <form id="removeForm" name="kayitSil" method="post"  action="{{ route('admin.translate.remove', ['id' => $dil->parentId ]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn rounded-pill btn-icon btn-danger remove-btn"  data-title="Sil" data-intro="Silme işlemlerinizi burada yapabilirsiniz" data-step="5">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            <a href="{{ route('admin.translate.update_form', ['id' => $dil->parentId ]) }}" class=" mx-2 btn rounded-pill btn-icon btn-info "  data-title="Güncelle" data-intro="Güncelleme işlemlerini buradan yapabilirsiniz" data-step="6">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </div>



                                                    </td>


                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>



                                        <div class="my-4 py-4 "> &nbsp; </div>


                                    </div>
                                </div>

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

