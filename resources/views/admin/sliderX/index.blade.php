@extends('admin.layouts.master')
.....................

@section('content')
         <!-- Content wrapper -->
         <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slider Yönetimi /</span> Slider</h4>

              <div class="row">
                <div class="col-md-12">
                   
              
                  <div class="card  ">
                    <h5 class="card-header">Slider </h5>
                  
                    <div class="card-body my-3">
                      <h4>Yeni Slider Ekle</h4>
                      <form  action="{{ route('admin.slider.insert') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                         @csrf
                         @method('put')
               
                        <div class="row">

    
                          <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input  class="form-control" type="text" id="title" name="title" placeholder="Title" />
                          </div>
                    
                        
                        
                          <div class="mb-3 col-md-6">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <input  class="form-control" type="text" id="sub_title" name="sub_title" placeholder="Subtitle" />
                          </div>
                       
                        
                          <div class="mb-3 col-md-6">
                            <label for="sale" class="form-label">Sale</label>
                            <input  class="form-control" type="text" id="sale" name="sale" placeholder="Sale" />
                          </div>
                        
                          <div class="mb-3 col-md-6">
                            <label for="link" class="form-label">Link</label>
                            <input  class="form-control" type="text" id="link" name="link" placeholder="link" />
                          </div>
                        
                          <div class="mb-3 col-md-6">
                            <label for="seo" class="form-label">Seo</label>
                            <input  class="form-control" type="text" id="seo" name="seo" placeholder="Seo" />
                          </div>
                       
                        
                         <input type="hidden" name="old_background" value="">

                          <div class="card-body" style="padding:38px">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                              <img
                                src="{{asset('default/avatar.png')}}"
                                alt="background"
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
                                    name="background"
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
                         
 
                        
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>

        
  

                         <!-- Bootstrap Table with Header - Light -->
              <div class="card mt-3">
                <h5 class="card-header">Slider Listeleme</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>sale</th>
                        <th>link</th>
                        <th>seo</th>
                        <th>resim</th>
                        <th>status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    
                        @foreach ($sliders as $slider )
                          
                      
                  
                  
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $slider->title }}</strong></td>
                        <td> {{ $slider->sub_title }} </td>
                        <td> {{ $slider->sale }} </td>
                        <td> {{ $slider->link }} </td>
                        <td> {{ $slider->seo }} </td>
                        <td> 
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="{{ $slider->background }}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>  
                        
                        </td>
                        
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('admin.slider.edit', ['id' => $slider->id ]) }}" >
                                <i class="bx bx-edit-alt me-1"></i> Edit</a >

                                <form method="post" action="{{ route('admin.slider.destroy', ['id' => $slider->id ]) }}">
                                  @csrf
                                  @method("DELETE")
                              <button onclick="return confirm('silmek istediğinize eminmisniz')" type="submit" class="dropdown-item"  >
                                <i class="bx bx-trash me-1"></i> Delete</button>
                                </form>



                            </div>
                          </div>
                        </td>
                      </tr>



                      @endforeach



                      
                    </tbody>
                  </table>

                  <div>&nbsp;</div> 
                  <div>&nbsp;</div> 
                  <div>&nbsp;</div> 
                  <div>&nbsp;</div> 

                </div>
              </div>
              <!-- Bootstrap Table with Header - Light -->

              

                </div>




              </div>
            </div>
            <!-- / Content -->

       
          </div>
        
@endsection


@section('js')

<script>
  $(document).ready(function() {   
    
  $("#uploadedAvatar").attr('src',' ');

   });

</script>

<script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('admin/assets/js/pages-account-settings-account.js')}}"></script>




@endsection