
@extends('admin.layouts.master')

@section('title')
    Çeviri Ekle
@endsection
@section('css')

@endsection



@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Çeviriler /</span> Çeviri  Ekle  </h4>


            <div class="card">

                <div class="card-body my-3">

                    <form  action="{{ route('admin.translate.save') }}"  id="formAccountSettings" method="POST" enctype="multipart/form-data" >

                        @csrf
                        @method('put')


                        <div class="row">
                            <div class="col-xl-12">

                                <div class="nav-align-top mb-4">

                                    <ul class="nav nav-pills mb-3" role="tablist">

                                        @foreach(getLangs() as $key => $dil)


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

                                            <div id="tab{{ $dilb->kod }}"   class="tabcontent" style="{{ $dilb->kod == "tr" ? 'display: block;' : 'display: none;' }} " >

                                                <p>
                                                    <label for="kod" class="form-label">Başlık </label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="baslik"
                                                        name="baslik_{{ $dilb->kod }}"
                                                        placeholder="Başlık"  required
                                                        autocomplete="off"
                                                        value="{{ old('baslik_'.$dilb->kod) }}"
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
                                                    value="{{ old('const_'.$dilb->kod) }}"
                                                />

                                                <div> &nbsp; </div>



                                            </div>

                                        @endforeach
                                            <input type="hidden" name="const_url" value="">
                                    </div>


                                </div>

                            </div>





                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                <a href="{{route('admin.translate.index')}}" class="btn btn-outline-secondary">Geri</a>
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

