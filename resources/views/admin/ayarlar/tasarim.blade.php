@extends('admin.layouts.master')

@section('title')
    Site Ayarları
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar /</span> Tasarım Ayarları</h4>

            <div class="row">
                <div class="col-md-12">

                    <div class="card  ">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.ayarlar.update') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                                @csrf
                                @method('put')
                                <input type="hidden" name="gidenform" value="tasarim">

                                <div class="row">

                                    <div class="divider">
                                        <div class="divider-text">Genel</div>
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="theme_color" class="form-label">Theme Color   </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="theme_color"
                                            name="theme_color"
                                            value="{{$ayarlar['theme_color']}}"
                                            placeholder="Theme Color"
                                            autofocus  required
                                        />
                                    </div>

                                    <div class="divider">
                                        <div class="divider-text">Slider</div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_baslik_1"  type="checkbox" class="checkbox"  {{ $ayarlar['slider_baslik_1'] == 1 ? 'checked' : '' }} >
                                                <div class="slider"></div>
                                            </label>
                                            Slider baslik 1
                                        </div>

                                        <hr>

                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_baslik_2"  type="checkbox" class="checkbox"  {{ $ayarlar['slider_baslik_2'] == 1 ? 'checked' : '' }} >
                                                <div class="slider"></div>
                                            </label>
                                            Slider baslik 2
                                        </div>

                                        <hr>

                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_baslik_3"  type="checkbox" class="checkbox"   {{ $ayarlar['slider_baslik_3'] == 1 ? 'checked' : '' }} >
                                                <div class="slider"></div>
                                            </label>
                                            Slider baslik 3
                                        </div>

                                        <hr>

                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_button"  type="checkbox" class="checkbox"   {{ $ayarlar['slider_button'] == 1 ? 'checked' : '' }} >
                                                <div class="slider"></div>
                                            </label>
                                            Slider Button
                                        </div>

                                        <hr>

                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_ikinci_resim"  type="checkbox" class="checkbox"  {{ $ayarlar['slider_ikinci_resim'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            Slider  İkinci Resim
                                        </div>

                                        <hr>

                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="slider_link"  type="checkbox" class="checkbox"  {{ $ayarlar['slider_link'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                           Slider Link
                                        </div>

                                        <hr>

                                    </div>




                                    <div class="divider">
                                        <div class="divider-text">Kategoriler </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="categories_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['categories_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            Kategori kullan
                                        </div>

                                        <hr>

                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="categories_alt_kategori"  type="checkbox" class="checkbox"  {{ $ayarlar['categories_alt_kategori'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            Kategorilerde alt kategori olsun
                                        </div>

                                        <hr>

                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="categories_resim_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['categories_resim_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            Kategorilerde resim  olsun
                                        </div>
                                        <hr>
                                    </div>





                                    <div class="divider">
                                        <div class="divider-text">Ürünler</div>
                                    </div>




                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_marka_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_marka_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde marka kullan
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_dosya1_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_dosya1_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde 1. dosyayı kullan
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_dosya2_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_dosya2_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde  2. dosyayı kullan
                                        </div>
                                        <hr>
                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_dosya3_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_dosya3_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde 3. dosyayı kullan
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_fiyat_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_fiyat_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde fiyat kullan
                                        </div>
                                        <hr>
                                    </div>

                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_onceki_fiyat_kullan"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_onceki_fiyat_kullan'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                             Ürünlerde önceki fiyat  kullan
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_bayi_fiyati"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_bayi_fiyati'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_bayi_fiyati
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_urunkodu"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_urunkodu'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_urunkodu
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_bagimlilik"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_bagimlilik'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_bagimlilik
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_sure"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_sure'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_sure
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_kargo_fiyati"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_kargo_fiyati'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_kargo_fiyatı
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_video_linki"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_video_linki'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_video_linki
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_stok_miktari"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_stok_miktari'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_stok_miktari
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_yeni_urun"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_yeni_urun'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_yeni_urun
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_populer_urun"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_populer_urun'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_populer_urun
                                        </div>
                                        <hr>
                                    </div>
                                  <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label class="switch">
                                                <input name="urunlerde_onecikar_urun"  type="checkbox" class="checkbox"  {{ $ayarlar['urunlerde_onecikar_urun'] == 1 ? 'checked' : '' }}    >
                                                <div class="slider"></div>
                                            </label>
                                            urunlerde_onecikar_urun
                                        </div>
                                        <hr>
                                    </div>


                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                    <button type="reset" class="btn btn-outline-secondary">Vazgeç</button>
                                </div>
                            </form>
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

    <script>
        $(document).ready(function() {


        });

    </script>



@endsection

