<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

 

trait FileUploadTrait
{
  
    function uploadImage(Request $request, string $inputName, string $oldPath = null, string $path = '/uploads'): ?string  // fonksiyonun dönüş türün string olacak
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();  
           
            $imageName = 'media_' . uniqid() . '.' . $ext;
            
           // $image->move(public_path($path), $imageName);
           $image->move($_SERVER['DOCUMENT_ROOT'].'/uploads', $imageName);
            $default = '/default';
            if ($oldPath && File::exists(public_path($oldPath)) && strpos( $oldPath , $default) !== 0 ) {
                File::delete(public_path($oldPath));
            }
            // /uploads/media_5151.png
            return $path . '/' . $imageName;
        }
        return $oldPath;
    }

}





?>
