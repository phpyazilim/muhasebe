@extends('admin.layouts.master')


@section('title')
Sistem Kullanıcıları 
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
                    <h4 class="fw-bold py-3 mb-4 text-left" ><span class="text-muted fw-light">Sistem Kullanıcıları /</span> Tüm Kullanıcılar  </h4>
                </div>
                <div class="col-md-6 " style="  text-align: right; padding-top: 15px">
                    <a href="{{ route('admin.sistemkullanicilari.add' ) }}" class="btn btn-primary "  data-title="Yeni Ekle" data-intro="Buradan ekleme işlemi yapabilirsiniz" data-step="2">Yeni Ekle</a>
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

                                                 
                                                    <th style="width: 40%" align="left">Firma Adı</th>
                                                    <th style="width: 40%" align="left">Kayıt Tarihi</th>
                                                    <th style="width: 10%">Durumu</th>
                                                    <th  style="width: 10%">İşlem</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0 "   >

                                                @foreach($kullanicilar as $kullanici)

                                                <tr >
                                                 
                                                    <td> <strong>{{ $kullanici->firma_adi }}</strong></td>
                                                    <td> {{ $kullanici->firma_email }}</td>
                                                    <td> {{ $kullanici->firma_telefon }}</td>


                                                   {{--  <td>  <img
                                                            src="{{asset($kullanici->logo)}}"
                                                            alt="Marka İkonu"
                                                            class="d-block rounded"
                                                            width="100"
                                                            id="uploadedAvatar"
                                                        /></td> --}}


                                                    <td data-title="Aktif/Pasif" data-intro="Burayı tıklayarak durumu aktif pasif hale getirebilirsiniz." data-step="4" >
                                                        <label class="switch">
                                                            <input
                                                                data-url="{{ route('admin.sistemkullanicilari.isActiveSetter', $kullanici->id) }}"
                                                                type="checkbox"
                                                                class="checkbox isActive"
                                                                {{ $kullanici->isActive == 1 ? 'checked' : '' }}
                                                            >
                                                            <div class="slider"></div>
                                                        </label>
                                                    </td>

                                                    <td>

                                                        <div style="display: flex; align-items: center;" >
                                                            <form id="removeForm" name="kayitSil" method="post"  action="{{ route('admin.sistemkullanicilari.remove', ['id' => $kullanici->id ]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn rounded-pill btn-icon btn-danger remove-btn" data-title="Sil" data-intro="Silme işlemlerinizi burada yapabilirsiniz" data-step="5">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            <a href="{{ route('admin.sistemkullanicilari.update_form', ['id' => $kullanici->id ]) }}" class=" mx-2 btn rounded-pill btn-icon btn-info " data-title="Güncelle" data-intro="Güncelleme işlemlerini buradan yapabilirsiniz" data-step="6">
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

