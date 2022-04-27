<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormUpdateRequest extends FormRequest
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
            //'category_id'=>['required'],
            'name'=>['required','min:3','max:120'],
            'description'=>['required','min:8'],
            'price'=>['required','regex:/^\d+(\.\d{1,2})?$/'],
            'price_status'=>['required'],
            'condition'=>['required'],
            'location'=>['max:50'],
           // 'country_id'=>['required'],
           // 'phone_number'=>['required','numeric'],
            
            'link'=>['url'],
        ];
    }
}
