@extends('admin.layouts.master')


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
                      <h4>  Slider Güncelle</h4>
                      <form  action="{{ route('admin.slider.update', ['id' => $slider->id ] ) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data"  >
                        @csrf
                        @method('put')
              
                       <div class="row">

   
                         <div class="mb-3 col-md-6">
                           <label for="title" class="form-label">Title</label>
                           <input value="{{ $slider->title }}" class="form-control" type="text" id="title" name="title" placeholder="Title" />
                         </div>
                   
                       
                       
                         <div class="mb-3 col-md-6">
                           <label for="sub_title" class="form-label">Subtitle</label>
                           <input  value="{{ $slider->sub_title }}"  class="form-control" type="text" id="sub_title" name="sub_title" placeholder="Subtitle" />
                         </div>
                      
                       
                         <div class="mb-3 col-md-6">
                           <label for="sale" class="form-label">Sale</label>
                           <input   value="{{ $slider->sale }}"  class="form-control" type="text" id="sale" name="sale" placeholder="Sale" />
                         </div>
                       
                         <div class="mb-3 col-md-6">
                           <label for="link" class="form-label">Link</label>
                           <input  value="{{ $slider->link }}"  class="form-control" type="text" id="link" name="link" placeholder="link" />
                         </div>
                       
                         <div class="mb-3 col-md-6">
                           <label for="seo" class="form-label">Seo</label>
                           <input  value="{{ $slider->seo }}"  class="form-control" type="text" id="seo" name="seo" placeholder="Seo" />
                         </div>
                      
                       
                        <input type="hidden" name="old_background" value="{{ $slider->background }}">

                         <div class="card-body" style="padding:38px">
                           <div class="d-flex align-items-start align-items-sm-center gap-4">
                             <img
                               src="{{asset( $slider->background)}}"
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
               
                        <div class="row">

    
                          <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input value="{{ $slider->title }}" class="form-control" type="text" id="title" name="title" placeholder="Title" />
                          </div>
                    
                        
                        
                          <div class="mb-3 col-md-6">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <input  value="{{ $slider->sub_title }}"  class="form-control" type="text" id="sub_title" name="sub_title" placeholder="Subtitle" />
                          </div>
                       
                        
                          <div class="mb-3 col-md-6">
                            <label for="sale" class="form-label">Sale</label>
                            <input   value="{{ $slider->sale }}"  class="form-control" type="text" id="sale" name="sale" placeholder="Sale" />
                          </div>
                        
                          <div class="mb-3 col-md-6">
                            <label for="link" class="form-label">Link</label>
                            <input  value="{{ $slider->link }}"  class="form-control" type="text" id="link" name="link" placeholder="link" />
                          </div>
                        
                          <div class="mb-3 col-md-6">
                            <label for="seo" class="form-label">Seo</label>
                            <input  value="{{ $slider->seo }}"  class="form-control" type="text" id="seo" name="seo" placeholder="Seo" />
                          </div>
                       
                        
                         <input type="hidden" name="old_background" value="{{ $slider->background }}">

                          <div class="card-body" style="padding:38px">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                              <img
                                src="{{asset( $slider->background)}}"
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

        
   
              

                </div>




              </div>
            </div>
            <!-- / Content -->

       
          </div>
        
@endsection


@section('js')

<script>
  $(document).ready(function() {   
    
  $("#uploadedAvatar").attr('src','{{asset( $slider->background)}}');

   });

</script>

<script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('admin/assets/js/pages-account-settings-account.js')}}"></script>




@endsection