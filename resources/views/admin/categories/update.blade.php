
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategoriler /</span> Kategori Düzenle  </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.categories.update',['id' => $id ]) }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

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


                                    @if ( config('site.categories_alt_kategori') == 1)
                                    <div class="col-md-12 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Kategori Seçiniz    </label>
                                        <select name="category" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            @foreach(getAllCategories() as $menu)
                                                <option value="{{ $menu->id }}" @if($menu->parentId == $icerik->parentId) selected @endif>  {{ $menu->baslik }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    <div class="col-xl-12">

                                        @foreach(getLangs() as $keyb => $dilb)
                                            @php
                                                $i = $key + 1;
                                            @endphp



                                            <div id="tab{{ $dilb->kod }}"   class="tabcontent" style="{{ $dilb->kod == "tr" ? 'display: block;' : 'display: none;' }} " >


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



                                            </div>

                                        @endforeach

                                    </div>





                                </div>
                            </div>





                            @if ( config('site.categories_resim_kullan') == 1)
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





                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.categories.index' )}}" class="btn btn-outline-secondary">Geri</a>
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

