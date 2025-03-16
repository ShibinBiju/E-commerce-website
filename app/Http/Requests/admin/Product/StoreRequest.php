<?php

namespace App\Http\Requests\admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'category_id' => 'required|exists:categories,id', // Valid category ID
            'description' => 'nullable|string|max:1000', // Optional description
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'image.image' => 'The image must be a valid image file (jpeg, png, jpg, gif).',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'description.max' => 'The description may not be greater than 1000 characters.',
        ];
    }
}
