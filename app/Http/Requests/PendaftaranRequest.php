<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'username'      => 'required',

            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'captcha'       => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nama Harus diisi",
            "username.required" => "Username Harus diisi",
            "email.required" => "Email Harus diisi",
            "email.unique" => "Email Sudah terdaftar, silahkan gunakan email lain",
            "password.min" => "Password Minimal 6 Karakter",
            "captcha.required" => "Masukan kode Captcha",
            "captcha.captcha" => "Kode Captcha Salah",
            "password.required" => "Password tidak boleh kosong",
            "password.same" => "Password tidak cocok",
            "password_confirmation.required" => "Konfirmasi Password tidak boleh kosong",
        ];
    }
}
