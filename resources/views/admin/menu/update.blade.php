<?php

//   print_r($dildeger);
//   die();

?>
@extends('admin.layouts.master')

@section('title')
    Menüler
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menüler /</span> Menü Güncelle  </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.menu.update',['id' => $id ]) }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                        @csrf
                        @method('put')


                        <form class="row">
                <div class="col-xl-12">

                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">

                            @foreach(getLangs() as $key => $dil)
                                @php
                                    $i = $key + 1;
                                @endphp

                                <li class="nav-item">
                                    <button
                                        id ="tab_{{ $dil->kod }}"
                                        type="button"
                                        class="nav-link {{  $dil->kod == 'tr' ? 'active' : '' }}"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-top-{{ $dil->kod }}"
                                        aria-controls="navs-pills-top-{{ $dil->kod }}"
                                        aria-selected="{{ $key === 0 ? 'true' : 'false' }}"
                                        onclick="openTab(event, 'tab{{ $dil->kod }}')"
                                    >
                                        {{ $dil->baslik }}
                                    </button>

                                </li>


                            @endforeach



                        </ul>
                        <div class="tab-content">

                            @foreach(getLangs() as $keyb => $dilb)
                                <div id="tab{{ $dilb->kod }}"   class="tabcontent" style="{{ $dilb->kod == "tr" ? 'display: block;' : 'display: none;' }} " >

                                <p>
                                    <label for="kod" class="form-label">Başlık   </label>
                                    <input

                                        class="form-control"
                                        type="text"
                                        id="baslik"
                                        name="baslik_{{ $dilb->kod }}"
                                        placeholder="Başlık"  required
                                        autocomplete="off"
                                        value="{{$dildeger[$dilb->kod]->baslik}}"
                                    />
                                </p>

                                <label for="kod"   >Const </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="const"
                                    name="const_{{ $dilb->kod }}"
                                    placeholder="Const"
                                    autocomplete="off"
                                    value="{{$dildeger[$dilb->kod]->url}}"
                                />

                                <div> &nbsp; </div>



                            </div>
                            @endforeach

                        </div>


                        <div class="form-group">
                            <label for="kod"   >  İçerik için kategori id belirle </label>
                                <input name="icerik_kategori_id_belirle"  type="text"  value="{{$menu->icerik_kategori_id_belirle}}">

                        </div>

                        <hr>


                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_resim"  type="checkbox" class="checkbox" {{ $menu->icerik_resim == 1 ? 'checked' : '' }} >
                                <div class="slider"></div>
                            </label>
                            İçerik ayfasında resim eklenebilsin
                        </div>
                        <hr>


                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_ekleme"  type="checkbox" class="checkbox"  {{ $menu->icerik_ekleme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Yeni içerikler eklemeye izin verme
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_silme"  type="checkbox" class="checkbox"  {{ $menu->icerik_silme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Eklenen içerikler silinemesin
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_duzenleme"  type="checkbox" class="checkbox"  {{ $menu->icerik_duzenleme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Eklenen içerikler düzenlenemesin
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_tarih_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_tarih_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçeriğe tarih ekle
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_tag_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_tag_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçeriğe tag(etiket) ekle
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_url_gosterme"  type="checkbox" class="checkbox"  {{ $menu->icerik_url_gosterme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçerikte url gösterme
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_link_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_link_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçerikte link olsun
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_baslik2_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_baslik2_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İceriğe  baslik2 ekle
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_kisa_aciklama_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_kisa_aciklama_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçeriğe kısa açıklama ekle
                        </div>


                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_aciklama_ekleme"  type="checkbox" class="checkbox"  {{ $menu->icerik_aciklama_ekleme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçeriğe   açıklama ekleme
                        </div>


                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_isactive_gosterme"  type="checkbox" class="checkbox"  {{ $menu->icerik_isactive_gosterme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçeriğe   aktif/pasif butonu  ekleme
                        </div>
 
                        <hr>


                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_siralama_ekleme"  type="checkbox" class="checkbox"  {{ $menu->icerik_siralama_ekleme == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            İçerikte sıralama ekleme
                        </div>
 
                        <hr>

 
                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_dosya1_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_dosya1_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Dosya 1 ekle
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_dosya2_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_dosya2_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Dosya 2 ekle
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="switch">
                                <input name="icerik_dosya3_ekle"  type="checkbox" class="checkbox"  {{ $menu->icerik_dosya3_ekle == 1 ? 'checked' : '' }}>
                                <div class="slider"></div>
                            </label>
                            Dosya 3 ekle
                        </div>
                        <hr>

                    </div>
                </div>


                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                    <a href="{{route('admin.menu.index')}}" class="btn btn-outline-secondary">Geri</a>
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

