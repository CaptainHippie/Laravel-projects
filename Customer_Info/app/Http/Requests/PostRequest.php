<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'=>'required',
            'sales'=>'required|min:0',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            //'profile_pic'=>'required',
            //'invoice_date'=>'required',
        ];
    }
}

