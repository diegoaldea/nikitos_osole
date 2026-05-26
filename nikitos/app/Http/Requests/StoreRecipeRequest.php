<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15360',
            'preparation_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'ingredients' => 'required|array|min:1',
            'steps' => 'required|array|min:1',
        ];
    }
}