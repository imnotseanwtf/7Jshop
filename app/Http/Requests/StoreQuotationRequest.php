<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends FormRequest
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
            'quotation' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:11', 'max:13'],
            'description' => ['required', 'string', 'max:255'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'file', 'max:10240'], // max file size 10mb
            'quantity' => ['required', 'integer'],
        ];
    }
}
