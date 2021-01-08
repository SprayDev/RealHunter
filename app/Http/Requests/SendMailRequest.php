<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'email' => 'Почтовый адрес',
            'name' => 'Имя пользователя',
            'phone' => 'Номер телефона'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
//            'name' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute обязательное поле!',
            'name.required' => ':attribute обязательное поле!',
            'phone.required' => ':attribute обязательное поле!'
        ];
    }
}
