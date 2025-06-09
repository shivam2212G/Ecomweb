<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'pro_name' => 'required|string|max:255',
        'pro_price' => 'required|numeric|min:0',
        'pro_image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'pro_description' => 'required|string|max:1000',
        ];
    }

    public function messages()
{
    return [
        'pro_name.required' => 'Please enter the product name.',
        'pro_name.string' => 'The product name must be text.',
        'pro_name.max' => 'The product name is too long.',

        'pro_price.required' => 'Please enter the product price.',
        'pro_price.numeric' => 'The price must be a number.',
        'pro_price.min' => 'The price can’t be negative.',

        'pro_image.required' => 'Please upload a product image.',
        'pro_image.image' => 'The file must be an image.',
        'pro_image.mimes' => 'Only JPEG, PNG, JPG, GIF, SVG, or WEBP images are allowed.',
        'pro_image.max' => 'The image is too large. Max size is 2MB.',

        'pro_description.required' => 'Please write a description for the product.',
        'pro_description.string' => 'The description must be text.',
        'pro_description.max' => 'The description is too long.',
    ];
}
}
