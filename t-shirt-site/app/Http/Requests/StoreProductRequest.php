<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'required|string|max:255|unique:products,sku',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'is_active' => 'boolean',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire',
            'slug.required' => 'Le slug est obligatoire',
            'slug.unique' => 'Ce slug existe déjà',
            'price.required' => 'Le prix est obligatoire',
            'price.numeric' => 'Le prix doit être un nombre',
            'stock.required' => 'Le stock est obligatoire',
            'sku.required' => 'Le SKU est obligatoire',
            'sku.unique' => 'Ce SKU existe déjà',
            'category_id.required' => 'La catégorie est obligatoire',
            'category_id.exists' => 'Cette catégorie n\'existe pas'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Erreurs de validation',
            'errors' => $validator->errors()
        ], 422));
    }
}
