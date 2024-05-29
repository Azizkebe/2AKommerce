<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandRegisterVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:vendors,email',
            'password'=>'required|min:4',
        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'Mettez votre nom et prenom',
            'email.required'=>'Email est requis',
            'email.unique'=>'Email existe déjà',
            'password.required'=>'le mot de passe est requis',
            'password.min'=>'Email doit etre au minimum 4 quatre caracteres',
        ];
    }
}
