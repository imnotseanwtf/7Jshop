<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesReportRequest extends FormRequest
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
            'date' => ['required', 'date',],
            'description' => ['required', 'string', 'max:255'],
            'amount' => ['required'],
            'quantity' => ['required', 'integer'],
            'down_payment' => ['required'],
            'status' => ['required', 'integer'],
        ];
    }
}
