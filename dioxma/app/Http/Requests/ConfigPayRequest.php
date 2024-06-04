<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigPayRequest extends FormRequest
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
            'api_key'=>'required',
            'site_key'=>'required',
            'secret_key'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'api.required'=>'API KEY est requis',
            'site_key.required'=>'SITE KEY est requis',
            'secret_key.required'=>'secret_key est requis',
        ];
    }
}
