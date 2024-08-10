<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\File;


class FileController extends Controller
{
    public function index()  { 

        //chmod($filePath, 0644); 

             // print_r(getFolderFiles('app')); die();
             //  $files = File::allFiles(base_path());
             //  $files = File::allFiles(base_path('app'));
             // $files = getFolderFiles('app');
             //  var_dump($files);
        return view('admin.files.index' ); 

    }




    public function edit($file) {  
      
      //  $filePath = base_path( $file);
   
     // print_r($file); die();

     $file = str_replace('-', '/',  $file);
        
        
    $content = File::get($file); 
 
        
    return view('admin.files.edit', compact('file', 'content'));
}



public function update(Request $request, $file) { 

   // $filePath = base_path( $file);
 //  $file = urldecode($file);
 //$file =  base_path( str_replace('-', '/',  $file));
     $file = str_replace('-', '/',  $file);
    $filePath = $file;
    chmod($filePath, 0777); 
    File::put($filePath, $request->input('content'));
    chmod($filePath, 0644); 
    toastr()->success('Güncelleme işlemi başarılı');
    return redirect()->back();

   // return redirect()->route('admin.files.index')->with('success', 'File updated successfully');

}




}
