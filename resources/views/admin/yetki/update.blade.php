<?php

//    print_r($menuInfo->icerik_tarih_ekle);
//    die();
?>
@extends('admin.layouts.master')

@section('title')
    Yetki Güncelle
@endsection
@section('css')

@endsection



@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Yetkiler  /</span>   Yetki Güncelle </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.yetki.update',['id' => $id]) }}"  id="formAccountSettings" method="POST"   >

                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-xl-12">

                                <div class="nav-align-top mb-4 pl-4">

                                    

                                        <div class="mb-3 col-md-12">
                                            <label for="kod" class="form-label"> Başlık   </label>
                                            <input
                                                value="{{ $yetki->baslik }}"
                                                class="form-control"
                                                type="text"
                                                id="baslik"
                                                name="baslik"
                                                placeholder="Başlık"  required
                                                autocomplete="off"
                                            />
                                        </div> 



                                        @php
                                        $permissions = json_decode($yetki->permissions);
                                        @endphp


                                       
                                        @foreach(yetki_tanim()  as $yetki_key => $yetki ) 



                                        <div class="mb-3 col-3">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="permissions[{{ $yetki_key }}]"  <?=(isset($permissions->$yetki_key) ) ? "checked" : ""?>  type="checkbox" class="checkbox"      >
                                                <div class="slider"></div>
                                            </label> 
                                            {{ $yetki }} 
                                        </div>  
                                        </div>  

 
                                        @endforeach 

 
                                </div>
 
                            </div>


  

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.yetki.index')}}" class="btn btn-outline-secondary">Geri</a>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- row -->

            </div></div>



    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
    </div>

@endsection


@section('js')




@endsection

