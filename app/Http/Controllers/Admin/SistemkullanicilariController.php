<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistemkullanicilari;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\File;



class SistemkullanicilariController extends Controller
{
    use FileUploadTrait;


    public function __construct()  {
        $this->middleware('checkUserPermission:sistemkullanicilari');
       
    }


    public function index() {

        $kullanicilar = array();

        return view('admin.sistemkullanicilari.list' , compact('kullanicilar') );

    }





}
