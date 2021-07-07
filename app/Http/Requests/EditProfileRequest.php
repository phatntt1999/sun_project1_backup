<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
            'avatar' => 'nullable|image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('messages.err_empty'),
            'name.max' => trans('messages.err_max'),
            'email.required' => trans('messages.err_empty'),
            'email.email' => trans('messages.err_email'),
            'password.min' => trans('messages.err_min'),
            'password.confirmed' => trans('messages.err_confirm'),
            'avatar.image' => trans('messages.err_img'),
        ];
    }
}
