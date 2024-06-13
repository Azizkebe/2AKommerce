<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'price'=>'required|integer',
            'quantity'=>'required|integer',

        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'Mettez le nom du produit',
            'price.required'=>'Le prix du produit est requis',
            'price.integer'=>'Le prix renseigné pas correcte',
            'quantity.integer'=>'La quantite renseignée pas correcte',
            'quantity.required'=>'La quantite est requise',
        ];
    }
}
