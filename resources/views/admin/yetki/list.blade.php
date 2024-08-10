<?php
//dd(getAllSlider());
//die();
?>

@extends('admin.layouts.master')


@section('title')
    Yetkiler
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
                    <h4 class="fw-bold py-3 mb-4 text-left" ><span class="text-muted fw-light">Yetkiler  /</span>     </h4>
                </div>
                <div class="col-md-6 " style="  text-align: right; padding-top: 15px">
                    <a href="{{ route('admin.yetki.add' ) }}" class="btn btn-primary ">Yeni Ekle</a>
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

                                                <th style="width: 20%">Başlık</th>
                                                <th style="width: 60%"> </th>
                                                <th  style="width: 20%">İşlem</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0    "   >

                                            @foreach( $yetkiler  as $yetki)


                                                <tr>
                                                    <td> <strong>{{ $yetki->baslik }}  </strong></td>
 
                                                    <td>
                                                         
                                                  {{--       {{ $yetki->permissions }}   --}}
                                                
                                                    </td>

                                                    <td align="right">

                                                        <div style="display: flex; align-items: right;">
                                                            <form id="removeForm" name="kayitSil" method="post"  action="{{ route('admin.yetki.remove', ['id' => $yetki->id ]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn rounded-pill btn-icon btn-danger remove-btn">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            <a href="{{ route('admin.yetki.update_form', ['id' => $yetki->id ]) }}" class=" mx-2 btn rounded-pill btn-icon btn-info ">
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

