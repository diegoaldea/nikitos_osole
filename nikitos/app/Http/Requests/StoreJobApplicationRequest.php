<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'position' => 'required|string|max:255',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
}