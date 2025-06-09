<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

        'contact_name' => 'required|string|max:255',
        'contact_email' => 'required|email|max:255',
        'contact_subject' => 'required|string|max:255',
        'contact_message' => 'required|string|max:1000',

        ];
    }
    public function messages()
  {
    return [
        'contact_name.required' => 'Please tell us your name.',
        'contact_name.string' => 'Your name should be letters.',
        'contact_name.max' => 'Your name is a bit too long.',

        'contact_email.required' => 'We need your email to talk to you.',
        'contact_email.email' => 'That doesn’t look like a real email.',
        'contact_email.max' => 'That email is too long.',

        'contact_subject.required' => 'Please tell us what this is about.',
        'contact_subject.string' => 'The subject should be words.',
        'contact_subject.max' => 'The subject is too long.',

        'contact_message.required' => 'Please write your message.',
        'contact_message.string' => 'The message should be words.',
        'contact_message.max' => 'The message is too long.',
    ];
  }

}
