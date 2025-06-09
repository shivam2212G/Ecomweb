<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

        'cat_name' => 'required|string|max:255',
        'cat_description' => 'required|string|max:1000',
        'cat_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Max 2MB

        ];
    }

    public function messages(){
        return [
        'cat_name.required' => 'Please tell us the category name.',
        'cat_name.string' => 'The category name should be words.',
        'cat_name.max' => 'That name is a little too long.',

        'cat_description.required' => 'Please describe the category.',
        'cat_description.string' => 'The description should be words.',
        'cat_description.max' => 'That description is a bit too long.',

        'cat_image.required' => 'Please choose a picture for the category.',
        'cat_image.image' => 'That file must be a picture.',
        'cat_image.mimes' => 'The picture must be a JPG, PNG, GIF, or similar.',
        'cat_image.max' => 'The picture is too big. Try a smaller one.',
    ];
    }
}
