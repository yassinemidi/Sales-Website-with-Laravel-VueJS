<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormRequest extends FormRequest
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
            'image_0'=>['required','mimes:png,jpeg,jpg'],
            'image_1'=>['required','mimes:png,jpeg,jpg'],
            'image_2'=>['required','mimes:png,jpeg,jpg'],
            'category_id'=>['required'],
            'name'=>['required','min:3','max:120'],
            'description'=>['required','min:8'],
            'price'=>['regex:/^\d+(\.\d{1,2})?$/'],
            'price_status'=>['required'],
            'condition'=>['required'],
            'location'=>['min:3','max:16'],
            'country_id'=>['required'],
            'phone_number'=>['required','numeric'],
            
            'link'=>['url'],
        ];
    }

    public function attributes()
{
    return [
        'image_0' => 'first Image',
        'image_1' => 'second Image',
        'image_2' => 'third Image',
    ];
}
}
