<?php

//    print_r($menuInfo->icerik_tarih_ekle);
//    die();
?>
@extends('admin.layouts.master')

@section('title')
    Resim Ekle
@endsection
@section('css')

@endsection
@section('csrftag')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
    <div class="  col-xl-12 text-right" style="margin-right: 0px !important;">

        <a href="{{route('admin.icerik.index',['id' => $id ])}}" class="btn btn-outline-secondary  ">Geri</a>
    </div>



        <!-- Content -->


            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">cccc  /</span> İçerik Ekle  </h4>

            <div class="card">


                <div class="card-body my-3">


                    <form data-url="{{ route('admin.icerik.refresh_image_list',['id' => $id ]) }}" action="{{ route('admin.icerik.file_upload',['id' => $id ]) }}" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '{{ route('admin.icerik.refresh_image_list',['id' => $id ]) }}'}" >

                        @csrf


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dz-message">
                                    <h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz.</h3>
                                    <p class="m-b-lg text-muted">(Yüklemek için resimleri buraya sürükleyin yada buraya tıklayarak resim seçebilirsiniz.)</p>
                                </div>

                            </div>




                        </div>
                    </form>

                <!-- row -->


            </div>

                <div class="m-5">
                <div class="image_refresh_div">  @include('admin.icerik.image_refresh_list', ['files' => $files]);   </div>
               </div>



            </div></div>



    </div>
    <!-- / Content -->







    <div class="content-backdrop fade"></div>
    </div>

@endsection


@section('js')



@endsection

