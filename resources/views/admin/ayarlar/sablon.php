@extends('admin.layouts.master')

@section('title')
    İletişim Sayfası
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-notifications.html"
                            ><i class="bx bx-bell me-1"></i> Notifications</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-connections.html"
                            ><i class="bx bx-link-alt me-1"></i> Connections</a
                            >
                        </li>
                    </ul>

                    <div class="card  ">

                        <div class="card-body my-3">
                            <form  action="{{ route('admin.profile.update') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                                @csrf
                                @method('put')

                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body" style="padding:38px">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img
                                            src="{{asset('default/avatar.png')}}"
                                            alt="user-avatar"
                                            class="d-block rounded"
                                            height="100"
                                            width="100"
                                            id="uploadedAvatar"
                                        />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input
                                                    type="file"
                                                    name="avatar"
                                                    id="upload"
                                                    class="account-file-input"
                                                    hidden
                                                    accept="image/png, image/jpeg"
                                                />
                                            </label>
                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>


                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">



                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Ad Soyad</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firstName"
                                            name="name"
                                            value=" "
                                            autofocus
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="email"
                                            name="email"
                                            value=" "
                                            placeholder="john.doe@example.com"
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Telefon</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            name="phone"
                                            value="  "
                                        />
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="vergi_no">Vergi No </label>

                                        <input
                                            type="text"
                                            id="vergi_no"
                                            name="vergi_no"
                                            class="form-control"
                                            placeholder="vergi_no"
                                            value=" "
                                        />

                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Adres</label>
                                        <input  value=" " type="text" class="form-control" id="adres" name="adres" placeholder="Adres" />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="il" class="form-label">İL</label>
                                        <input  value=" " class="form-control" type="text" id="il" name="il" placeholder="İl" />
                                    </div>





                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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

