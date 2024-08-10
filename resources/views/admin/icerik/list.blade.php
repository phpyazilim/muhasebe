

@extends('admin.layouts.master')


@section('title')
    {{ $getMenu->baslik  }} 
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
                    <h4 class="fw-bold py-3 mb-4 text-left" ><span class="text-muted fw-light">İçerikler  /</span>  {{ $getMenu->baslik }}  </h4>
                </div>
                <div class="col-md-6 " style="  text-align: right; padding-top: 15px">
                    @if($menuInfo->icerik_ekleme != 1)
                    <a href="{{ route('admin.icerik.add',['id' => $id ] ) }}" class="btn btn-primary "   data-title="Yeni Ekle" data-intro="Buradan ekleme işlemi yapabilirsiniz" data-step="2">Yeni Ekle</a>
                    @endif

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
         @if($menuInfo->icerik_url_gosterme != 1) <th style="width: 20%">Url  </th>   @endif
                                                  <th style="width: 70%">Başlık</th>
       @if($menuInfo->icerik_isactive_gosterme != 1) <th style="width: 10%">Durumu</th>  @endif

                                                  <th  style="width: 10%">İşlem</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0  {{ $menuInfo->icerik_siralama_ekleme != 1 ? 'sortable' : '' }}   " data-url="{{route('admin.icerik.ranksetter')}}" >

                                            @foreach(getAllIcerikByParentId($id,"tr") as $icerik)


                                                <tr id="ord-{{ $icerik->parentId }}"   data-title="Sıralama" data-intro="Bu satırı sürükleyip sıralamayı değiştirebilirsiniz" data-step="3">
   @if($menuInfo->icerik_url_gosterme != 1)  <td> <strong>{{ $icerik->url }}    </strong></td>   @endif
                                                    <td>{{ $icerik->baslik }}</td>

                                                    @if($menuInfo->icerik_isactive_gosterme != 1)
                                                    <td  data-title="Aktif/Pasif" data-intro="Burayı tıklayarak durumu aktif pasif hale getirebilirsiniz." data-step="4">
                                                        <label class="switch">
                                                            <input
                                                                data-url="{{ route('admin.icerik.isActiveSetter', $icerik->parentId) }}"
                                                                type="checkbox"
                                                                class="checkbox isActive"
                                                                {{ $icerik->isActive == 1 ? 'checked' : '' }}
                                                            >
                                                            <div class="slider"></div>
                                                        </label>
                                                    </td>
                                                    @endif


                                                    <td>

                                                        <div style="display: flex; align-items: center;">

                                                            @if($menuInfo->icerik_silme != 1)
                                                            <form id="removeForm" name="kayitSil" method="post"  action="{{ route('admin.icerik.remove', ['id' => $icerik->parentId ]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn rounded-pill btn-icon btn-danger remove-btn"  data-title="Sil" data-intro="Silme işlemlerinizi burada yapabilirsiniz" data-step="5">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                            @endif


                                                             @if($menuInfo->icerik_duzenleme != 1)
                                                            <a href="{{ route('admin.icerik.update_form', ['id' => $icerik->parentId ]) }}" class=" mx-2 btn rounded-pill btn-icon btn-info "  data-title="Güncelle" data-intro="Güncelleme işlemlerini buradan yapabilirsiniz" data-step="6">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            @endif


                                                            @if($menuInfo->icerik_resim == 1)
                                                            <a href="{{ route('admin.icerik.image', ['id' => $icerik->parentId ]) }}" class=" mx-2 btn rounded-pill btn-icon btn-success "  data-title="Resim Ekle" data-intro="Resim ekleme işlemlerini buradan yapabilirsiniz" data-step="6">
                                                                <i class="fas fa-image"></i>
                                                            </a>
                                                            @endif


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

