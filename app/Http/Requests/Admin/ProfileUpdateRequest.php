<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; // Doğru kullanılacak kütüphane eklenmiş olmalı


class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * authorize içinde yetkilendirme yapılabilir 
     * return true yapılmazsa doğrulama işleminden geçmez 
     */
    public function authorize(): bool
    {
        return true;   // doprulama yapması için true olması gerekir 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {  // istediğimiz namelere istedğimiz kuralları tanımlayabiliriz
        return [
            'avatar' => ['nullable', 'image', 'max:2000'],     // boş olabilir , resim gelecek , max 2mb
            'name' => ['required' , 'max:250' ],   // max 250 karakter 
            'email' => [ 'required' , 'email' ,'max:250'  ],
            'vergi_no' => ['nullable' , 'max:250' ], 
            'phone' => ['nullable' , 'max:250' ], 
            'adres' => ['nullable' ], 
            'il' => ['nullable' , 'max:250' ], 
            'ilce' => ['nullable' , 'max:250' ], 
            'website' => ['nullable' , 'max:250' ], 
            'facebook' => ['nullable' , 'max:250' ], 
            'instagram' => ['nullable' , 'max:250' ], 
            'x_link' => ['nullable' , 'max:250' ], 
          

        ];
    }


    public function messages()
    {
        return [
            'avatar.image' => 'Avatar resmi olarak yüklenen dosyanın bir resim olması gerekir.',
            'avatar.max' => 'Avatar resmi en fazla 2MB boyutunda olabilir.',
            'name.required' => 'Ad alanı zorunludur.',
            'name.max' => 'Ad alanı en fazla :max karakter olabilir.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta alanı en fazla :max karakter olabilir.',
            'vergi_no.max' => 'Vergi numarası en fazla :max karakter olabilir.',
            // Diğer kurallar için benzer şekilde hata mesajlarını belirtebilirsiniz.
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            // Doğrulama işlemi bittikten sonra özel doğrulama adımları eklemek için kullanılır.
        });
    }


}
