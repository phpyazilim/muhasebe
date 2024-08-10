<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Content;
use Illuminate\Support\Facades\Session;


class FrontendController extends Controller
{
    public function index():View  {
       return view('frontend.anasayfa');
    }

    
    public function iletisim(Request $request):View  {

    //  dd(app()->getLocale());
    //   dd(getCeviriler(  $request));


/*     $ceviriler = Content::where('parent', 'translate')
    ->where('lang', "en")
    ->get(['baslik', 'url']);

    foreach ($ceviriler as $item) {
     echo $item["baslik"];
  }

      die(); */

     

        return view('frontend.iletisim');
     }



     function cerez(Request $request):RedirectResponse {
        //   // Session::forget('cerezOnay');
        Session::put('cerezOnay', 1);
        return redirect()->back();

    }
   




}
