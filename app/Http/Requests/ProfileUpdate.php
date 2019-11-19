<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdate extends FormRequest
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
            'email' => 'email',
            // 'psw' => 'min:8',
            // 're_psw' => 'min:8|same:psw'
        ];
    }

    public function message()
    {
        return[
            'email.unique' => 'email harus unik',
            'psw.min' => 'minimal 8 digit bro',
            're_psw.min' => 'minimal 8 digit bro'
        ];
    }
}