
@extends('admin.layouts.master')

@section('title')
    Ürün  Düzenle
@endsection


@section('css')


@endsection



@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ürünler /</span> Ürün Düzenle  </h4>


            <div class="card">

                <div class="card-body my-3">
                    <form  action="{{ route('admin.product.update',['id' => $id ]) }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

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

                                    

                                    @if ( config('site.categories_kullan') == 1)
                                    <div class="col-md-12 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Kategori Seçiniz    </label>
                                        <select name="category" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                            @foreach(getAllCategories() as $menu)
                                                <option value="{{ $menu->id }}"  @if($menu->id == $icerik->parentId) selected @endif>  {{ $menu->baslik }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif


                                    @if ( config('site.urunlerde_marka_kullan') == 1)
                                        <div class="col-md-12 mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label"> Marka Seçiniz   </label>
                                            <select name="markaId" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                                <option value="0" selected>Ana Kategori</option>
                                                @foreach(getAllMarkalar() as $marka)

                                                    <option value="{{ $marka->id }}"     {{ ($marka->id == $dildeger[$dil->kod]->markaId) ? 'selected' : '' }} >{{ $marka->baslik }}</option>

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


                                                <div>
                                                    <label for="kod" class="form-label">Açıklama </label>
                                                    <p> <textarea name="aciklama_{{ $dilb->kod }}" class="summernote" style="  ">{{optional($dildeger[$dilb->kod])->aciklama}}</textarea>
                                                    </p>
                                                </div>



                                                <div class="mb-3 col-md-6">
                                                    <label for="kod" class="form-label">Url </label>
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






                            @if(  config('site.urunlerde_dosya1_kullan') == 1 )
                                <div class="mb-3 col-md-4">
                                    <div class="card-body" style="padding:38px">
                                        <label for="" class="form-label">Dosya 1   </label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">

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
                                                        accept="*"
                                                    />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <input  type="hidden" name="old_dosya1"  value="{{$dildeger[$dilb->kod]->dosya1}}"  />
                                                  <a  href="{{asset($dildeger[$dilb->kod]->dosya1)}}" target="_blank"> {{ $dildeger[$dilb->kod]->dosya1 }} </a>
                                                {{--    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif


                            @if(  config('site.urunlerde_dosya2_kullan') == 1 )
                                <div class="mb-3 col-md-4">
                                    <div class="card-body" style="padding:38px">
                                        <label for="" class="form-label">Dosya 2   </label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">

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
                                                        accept="*"
                                                    />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <input  type="hidden" name="old_dosya2"  value="{{$dildeger[$dilb->kod]->dosya2}}"  />
                                                <a  href="{{asset($dildeger[$dilb->kod]->dosya2)}}" target="_blank"> {{ $dildeger[$dilb->kod]->dosya2 }} </a>
                                                {{--                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif



                            @if(  config('site.urunlerde_dosya3_kullan') == 1 )

                                <div class="mb-3 col-md-4">
                                    <div class="card-body" style="padding:38px">
                                        <label for="uploadd" class="form-label">Dosya 3  </label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                                            <div class="button-wrapper">
                                                <label for="uploadd" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Yeni Dosya Yükle</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input
                                                        type="file"
                                                        name="dosya3"
                                                        id="uploadd"
                                                        class="account-file-input"
                                                        hidden
                                                        accept="*"
                                                    />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <input  type="hidden" name="old_dosya3"  value="{{$dildeger[$dilb->kod]->dosya3}}"  />
                                                <a  href="{{asset($dildeger[$dilb->kod]->dosya3)}}" target="_blank"> {{ $dildeger[$dilb->kod]->dosya3 }} </a>
                                                {{--  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endif



 
                            
  

                            @if(  config('site.urunlerde_fiyat_kullan') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="fiyat" class="form-label">Fiyat </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="fiyat"
                                    name="fiyat"
                                    placeholder="Fiyat"
                                    autocomplete="off"
                                    value="{{optional($dildeger[$dilb->kod])->fiyat}}"
                                />
                            </div>

                            @endif


                            @if(  config('site.urunlerde_onceki_fiyat_kullan') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="onceki_fiyat" class="form-label">Önceki Fiyat </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="onceki_fiyat"
                                    name="onceki_fiyat"
                                    placeholder="Önceki Fiyat"
                                    autocomplete="off"
                                  value="{{optional($dildeger[$dilb->kod])->onceki_fiyat}}"
                                />
                            </div>

                            @endif


                            @if(  config('site.urunlerde_bayi_fiyati') == 1 )
                           
                             <div class="mb-3 col-md-6">
                                <label for="bayi_fiyati" class="form-label">Bayi Fiyatı </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="bayi_fiyati"
                                    name="bayi_fiyati"
                                    placeholder="Bayi Fiyatı"
                                    autocomplete="off"
                                    value="{{optional($dildeger[$dilb->kod])->bayi_fiyati}}"
                                />
                            </div>

                            @endif

                            @if(  config('site.urunlerde_urunkodu') == 1 ) 

                            <div class="mb-3 col-md-6">
                                <label for="urunkodu" class="form-label">Ürün Kodu </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="urunkodu"
                                    name="urunkodu"
                                    placeholder="Ürün Kodu"
                                    autocomplete="off"
                                      value="{{optional($dildeger[$dilb->kod])->urunkodu}}"
                                />
                            </div>


                            @endif

                            @if(  config('site.urunlerde_bagimlilik') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="bagimlilik" class="form-label">Ürün Bağımlılıkları </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="bagimlilik"
                                    name="bagimlilik"
                                    placeholder="Ürün Bağımlılıkları"
                                    autocomplete="off"
                                       value="{{optional($dildeger[$dilb->kod])->bagimlilik}}"
                                />
                            </div>



                            @endif

                            @if(  config('site.urunlerde_sure') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="sure" class="form-label">Süreli Ürün</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="sure"
                                    name="sure"
                                    placeholder="Süreli Ürün"
                                    autocomplete="off"
                                  value="{{optional($dildeger[$dilb->kod])->sure}}"
                                />
                            </div>


                            @endif

                            @if(  config('site.urunlerde_kargo_fiyati') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="kargoucreti" class="form-label">  Kargo Fiyatı</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="kargoucreti"
                                    name="kargoucreti"
                                    placeholder="Kargo Fiyatı"
                                    autocomplete="off"
                                       value="{{optional($dildeger[$dilb->kod])->kargoucreti}}"
                                />
                            </div>

                            @endif

                            @if(  config('site.urunlerde_video_linki') == 1 )
                            <div class="mb-3 col-md-6">
                                <label for="video_linki" class="form-label">  Ürün Videosu</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="video_linki"
                                    name="video_linki"
                                    placeholder="Ürün Videosu"
                                    autocomplete="off"
                                 value="{{optional($dildeger[$dilb->kod])->video_linki}}"
                                />
                            </div>

                            @endif

                            @if(  config('site.urunlerde_stok_miktari') == 1 )

                            <div class="mb-3 col-md-6">
                                <label for="stok" class="form-label">  Stok Miktarı  </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="stok"
                                    name="stok"
                                    placeholder="Stok Miktarı"
                                    autocomplete="off"
                                      value="{{optional($dildeger[$dilb->kod])->stok}}"
                                />
                            </div>


                            @endif

 


                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.product.index' )}}" class="btn btn-outline-secondary">Geri</a>
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

