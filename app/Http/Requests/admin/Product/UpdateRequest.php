<?php

namespace App\Http\Requests\admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'category_id' => 'nullable|exists:categories,id', // Valid category ID
            'description' => 'nullable|string|max:1000', // Optional description
        ];
    }

    public function messages()
    {
        return [
            'price.numeric' => 'The price must be a valid number.',
            'image.image' => 'The image must be a valid image file (jpeg, png, jpg, gif).',
            'category_id.exists' => 'The selected category does not exist.',
            'description.max' => 'The description may not be greater than 1000 characters.',
        ];
    }
}
