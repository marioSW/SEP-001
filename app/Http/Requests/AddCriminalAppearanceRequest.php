<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddCriminalAppearanceRequest extends Request
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
            //
            'person_id'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'hair_colour'=>'required',
            'eye_colour'=>'required',
        ];
    }
}
