<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'business_name' => 'required|string|max:255',
            'cuit' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'market_experience' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'business_hours' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'observations' => 'nullable|string',
        ];
    }
}