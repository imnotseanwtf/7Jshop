<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000', // added max file size limit of 10mb
            'product_description' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'stock' => ['required', 'integer'],
        ];
    }
}