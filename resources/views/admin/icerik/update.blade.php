
@extends('admin.layouts.master')

@section('title')
    İçerik  Düzenle
@endsection


@section('css')


@endsection



@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">İçerikler /</span> İçerik Ekle  </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.icerik.update',['id' => $id ]) }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                        @csrf
                        @method('put')


                        <div class="row">
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

 

                                    <div class="col-xl-12">

                                        @foreach(getLangs() as $keyb => $dilb)
                                            @php
                                                $i = $key + 1;
                                            @endphp
                                            <div id="tab{{ $dilb->kod }}"   class="tabcontent" style="{{ $dilb->kod == "tr" ? 'display: block;' : 'display: none;' }} " >

                                                @if($menuInfo->icerik_kategori_id_belirle > 0 )
                                                    <div class="col-md-12 mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Kategori Seçiniz    </label>
                                                        <select name="category" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                                            @foreach($icerikKat as $menu)
                                                                <option value="{{ $menu->parentId }}"   {{ $menu->parentId == $dildeger[$dilb->kod]->category ? 'selected' : '' }} >{{ $menu->baslik }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                @endif


                                            <div class="mb-3 col-md-12">
                                                <label for="kod" class="form-label">Başlık  </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    id="baslik"
                                                    name="baslik_{{ $dilb->kod }}"
                                                    placeholder="Başlık"  required
                                                    autocomplete="off"
                                                    value="{{optional($dildeger[$dilb->kod])->baslik}}"
                                                />
                                            </div>

                                                    @if($menuInfo->icerik_baslik2_ekle == 1)

                                            <div class="mb-3 col-md-12">
                                                <label for="kod" class="form-label">2. Başlık  </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    id="baslikiki"
                                                    name="baslikiki_{{ $dilb->kod }}"
                                                    placeholder="İkinci Başlık"
                                                    autocomplete="off"
                                                    value="{{optional($dildeger[$dilb->kod])->baslik2}}"
                                                />
                                            </div>
                                                    @endif


                                                    @if($menuInfo->icerik_kisa_aciklama_ekle == 1)
                                        <div>
                                            <label for="kod" class="form-label">Kısa Açıklama   </label>
                                            <p> <textarea name="kisaaciklama_{{ $dilb->kod }}" class="form-control" placeholder="Kısa Açıklama">{{optional($dildeger[$dilb->kod])->kisaaciklama}}</textarea>
                                            </p>
                                        </div>
                                                    @endif


                                                    @if($menuInfo->icerik_aciklama_ekleme == 0)
                                        <div>
                                            <label for="kod" class="form-label">Açıklama   </label>
                                            <p> <textarea name="aciklama_{{ $dilb->kod }}" class="summernote" style="  ">{{optional($dildeger[$dilb->kod])->aciklama}}</textarea>
                                            </p>
                                        </div>
                                                    @endif

                                                    @if($menuInfo->icerik_url_gosterme == 0)
                                                <div class="mb-3 col-md-6">
                                                    <label for="const" class="form-label">Url </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="const"
                                                        name="const_{{ $dilb->kod }}"
                                                        placeholder="Url"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->url}}"
                                                    />
                                                </div>
                                                    @endif





                                                    @if($menuInfo->icerik_tag_ekle == 1)
                                           <div class="mb-3 col-md-6">
                                                    <label for="tag" class="form-label">Tag </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="tag"
                                                        name="tag_{{ $dilb->kod }}"
                                                        placeholder="Tag"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->tag}}"
                                                    />
                                                </div>
                                                    @endif


                                                    @if($menuInfo->icerik_link_ekle == 1)
                                           <div class="mb-3 col-md-6">
                                                    <label for="link" class="form-label">Link </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="link"
                                                        name="link_{{ $dilb->kod }}"
                                                        placeholder="Link"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->link}}"
                                                    />
                                                </div>
                                                    @endif


                                                    @if($menuInfo->icerik_alan1_ekle == 1)
                                           <div class="mb-3 col-md-6">
                                                    <label for="deger1" class="form-label">Alan 1 </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="deger1_{{ $dilb->kod }}"
                                                        name="deger1_{{ $dilb->kod }}"
                                                        placeholder="Alan 1"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->deger1}}"
                                                    />
                                                </div>
                                                    @endif

                                                    @if($menuInfo->icerik_alan2_ekle == 1)
                                           <div class="mb-3 col-md-6">
                                                    <label for="deger2" class="form-label">Alan 2</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="deger2_{{ $dilb->kod }}"
                                                        name="deger2_{{ $dilb->kod }}"
                                                        placeholder="Alan 2"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->deger2}}"
                                                    />
                                                </div>
                                                    @endif

                                                        @if($menuInfo->icerik_alan3_ekle == 1)
                                           <div class="mb-3 col-md-6">
                                                    <label for="deger3" class="form-label">Alan 3 </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="deger3_{{ $dilb->kod }}"
                                                        name="deger3_{{ $dilb->kod }}"
                                                        placeholder="Alan 3"
                                                        autocomplete="off"
                                                        value="{{optional($dildeger[$dilb->kod])->deger3}}"
                                                    />
                                                </div>
                                                    @endif



                                            </div>

                                        @endforeach

                                    </div>





                                </div>
                            </div>


                            @if($menuInfo->icerik_tarih_ekle == 1)
                                <div class="mb-3 col-md-6">
                                    <label for="tarih" class="form-label">Tarih </label>
                                    <input
                                        class="form-control tarihi"
                                        type="text"
                                        id="tarih"
                                        name="tarih"
                                        placeholder="Tarih"
                                        autocomplete="off"
                                        value="{{optional($dildeger[$dilb->kod])->tarih}}"
                                    />
                                </div>
                            @endif



                            @if($menuInfo->icerik_dosya1_ekle == 1)
                                                <div class="mb-3 col-md-6">
                                                    <div class="card-body" style="padding:38px">
                                                        <label for="" class="form-label">Dosya 1   </label>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="{{ asset($dildeger[$dilb->kod]->dosya1) }}"
                                                                alt="Alt Logo"
                                                                class="d-block rounded"

                                                                width="100"
                                                                id="uploadedAvatar"
                                                            />
                                                            <div class="button-wrapper">
                                                                <label for="uploadb" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                                    <input
                                                                        type="file"
                                                                        name="dosya1"
                                                                        id="uploadb"
                                                                        class="account-file-input"
                                                                        hidden
                                                                        accept="image/png, image/jpeg"
                                                                    />
                                                                </label>
                                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>
                                                                <input  type="hidden" name="old_dosya1"  value="{{ $dildeger[$dilb->kod]->dosya1 }}"  />

                                                                {{--    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                            @endif



                            @if($menuInfo->icerik_dosya2_ekle == 1)
                                                <div class="mb-3 col-md-6">
                                                    <div class="card-body" style="padding:38px">
                                                        <label for="" class="form-label">Dosya 2   </label>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="{{ asset($dildeger[$dilb->kod]->dosya2) }}"
                                                                alt="Alt Logo"
                                                                class="d-block rounded"

                                                                width="100"
                                                                id="uploadedAvatar"
                                                            />
                                                            <div class="button-wrapper">
                                                                <label for="uploadc" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                                    <input
                                                                        type="file"
                                                                        name="dosya2"
                                                                        id="uploadc"
                                                                        class="account-file-input"
                                                                        hidden
                                                                        accept="image/png, image/jpeg"
                                                                    />
                                                                </label>
                                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>
                                                                <input  type="hidden" name="old_dosya2"  value="{{ $dildeger[$dilb->kod]->dosya2 }}"  />

{{--                                       <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                            @endif

                            @if($menuInfo->icerik_dosya3_ekle == 1)

                                                <div class="mb-3 col-md-6">
                                                    <div class="card-body" style="padding:38px">
                                                        <label for="uploadd" class="form-label">Dosya 3  </label>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="{{ asset($dildeger[$dilb->kod]->dosya3) }}"
                                                                alt="Alt Logo"
                                                                class="d-block rounded"
                                                                width="100"
                                                                id="uploadedAvatar"
                                                            />
                                                            <div class="button-wrapper">
                                                                <label for="uploadb" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                                    <input
                                                                        type="file"
                                                                        name="dosya3"
                                                                        id="uploadd"
                                                                        class="account-file-input"
                                                                        hidden
                                                                        accept="image/png, image/jpeg"
                                                                    />
                                                                </label>
                                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>
                                                                <input  type="hidden" name="old_dosya3"  value="{{ $dildeger[$dilb->kod]->dosya3 }}"  />

                                                                {{--                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                            @endif




                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.icerik.index',['id' => $menuInfo->id ])}}" class="btn btn-outline-secondary">Geri</a>
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

