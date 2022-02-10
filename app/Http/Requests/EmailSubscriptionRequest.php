<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSubscriptionRequest extends FormRequest
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
            'email' => 'required|email|unique:subscriptions|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => "The email has already been registered.",
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
//    public function attributes()
//    {
//        return [
//            'email' => 'email address',
//        ];
//    }
}
