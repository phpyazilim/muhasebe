
@extends('admin.layouts.master')


@section('title')
   
@endsection


@section('csrftag')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/cobalt.min.css">

    <style>


.CodeMirror {
 
    height: 600px;
 
}



    </style>


    @endsection

@section('content')


<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="row">
            <div class="col-md-12">
                <h4 class="fw-bold py-3 mb-4 text-left" ><span class="text-muted fw-light">Sayfayı Düzenle  /</span> App\{{ $file }}  </h4>
            </div>
            


            <div class="col-md-12">
 
                <input type="text" id="searchInput" class="w-full p-2 border border-gray-300 rounded" placeholder="Ara...">
 
            </div>

            <div class="col-md-12">

                <div class="card  ">

                    <div class="card-body my-3">

                        <div class="row">
                          
                          
                            <div class="col-md-4 mb-4 mb-md-0">
                                <small class="text-light fw-semibold"> -- </small>
                                <div class="accordion mt-3" id="accordionExample">
                                  <div class="card accordion-item  ">
                                    <h2 class="accordion-header" id="headingOne">
                                      <button
                                        type="button"
                                        class="accordion-button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne"
                                        aria-expanded="true"
                                        aria-controls="accordionOne"
                                      >
                                          App Klasörü 
                                      </button>
                                    </h2>
                            
                                    <div
                                      id="accordionOne"
                                      class="accordion-collapse collapse  "
                                      data-bs-parent="#accordionExample"
                                    >
                                      <div class="accordion-body">
                                        @include('admin.layouts.filename', ['path' => "app" ]) 
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo"
                                        aria-expanded="false"
                                        aria-controls="accordionTwo"
                                      >
                                          Views Klasörü
                                      </button>
                                    </h2>
                                    <div
                                      id="accordionTwo"
                                      class="accordion-collapse collapse"
                                      aria-labelledby="headingTwo"
                                      data-bs-parent="#accordionExample"
                                    >
                                      <div class="accordion-body">
                                        @include('admin.layouts.filename', ['path' => "resources" ]) 
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                      <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#accordionThree"
                                        aria-expanded="false"
                                        aria-controls="accordionThree"
                                      >
                                         Routes Klasörü
                                      </button>
                                    </h2>
                                    <div
                                      id="accordionThree"
                                      class="accordion-collapse collapse"
                                      aria-labelledby="headingThree"
                                      data-bs-parent="#accordionExample"
                                    >
                                      <div class="accordion-body">
                                        @include('admin.layouts.filename', ['path' => "routes" ]) 
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             
                            
                               </div>

 
                          
                            <div class="mb-3 col-md-8">

 
            <form action="{{ route('admin.files.update', ['file' => str_replace('/', '-', $file) ]) }}" method="POST">
                @csrf
                @method('PUT')
             
                <div>
                <textarea id="code-editor" name="content" >{{ $content }}</textarea>
                </div>
                <div> &nbsp; </div>
                <div>    <button type="submit"  class="btn btn-primary me-2">Güncelle</button>   </div>


            </form>
 


                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


@endsection



@section('js')



<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/php/php.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.8/mode/clike/clike.min.js"></script>


<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "application/x-httpd-php",
    indentUnit: 4,
    indentWithTabs: true,
    theme:'cobalt'
  });



  document.getElementById('searchInput').addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    const items = document.querySelectorAll('.file-item');
                    
                    items.forEach(item => {
                        const text = item.textContent.toLowerCase();
                        if (text.includes(query)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });



</script>



@endsection



