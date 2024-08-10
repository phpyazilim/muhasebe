<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // doprulama yapması için true olması gerekir 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   // UserProfileController içinde update fonksiyonunda çağırdık 
        // sayfanın üstünden use App\Http\Requests\Frontend\UserUpdateRequest; 
        // bu şekilde çağırdık
        return [
            'avatar' => ['nullable', 'image', 'max:2000'],     // boş olabilir , resim gelecek , max 2mb
            'name' => ['required' , 'max:20' ],   // max 250 karakter 
            'email' => [ 'required' , 'email' ,'max:250'  ],
        
          

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



}
