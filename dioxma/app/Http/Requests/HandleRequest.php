<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandleRequest extends FormRequest
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
            'email'=>'required|unique:users,email',
            'phone'=>'required|max:9|unique:users,phone',
            'password'=>'required|min:4',
            'address'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'Mettez votre nom et prenom',
            'email.required'=>'Email est requis',
            'email.unique'=>'Email existe déjà',
            'phone.required'=>'Le Telephone est requis',
            'phone.unique'=>'Le Telephone existe déjà',
            'phone.max'=>'Telephone doit etre au maximum 9 quatre chiffres',
            'password.required'=>'le mot de passe est requis',
            'password.min'=>'Email doit etre au minimum 4 quatre caracteres',
            'address.required'=>'L\'adresse est requis',
        ];
    }
}
