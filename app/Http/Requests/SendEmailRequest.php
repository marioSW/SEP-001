<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendEmailRequest extends Request
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
            'sender_name' => 'required',
            'sender_email' =>'required|email',
            'receiver_name' => 'required',
            'receiver_email' =>'required|email',
            'subject' => 'required',
            'message' =>'required',

        ];
    }
}
