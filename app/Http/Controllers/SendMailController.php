<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Mail sınıfını dahil ediyoruz
use App\Mail\ContactMail; // ContactMail sınıfını dahil ediyoruz



class SendMailController extends Controller
{


    public function iletisimsend(Request $request) {

        $formData = $request->all();

        Mail::to('phpyazilim@phpyazilim.com')->send(new ContactMail($formData));

       return redirect()->back()->with('success', 'İletişim formu başarıyla gönderildi!');
    }


}
