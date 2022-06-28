<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorPackageRequest extends FormRequest
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
            'title' =>' required|max:255', 
            'location' => 'required|max:255',
            'about' => 'required',
            'discount'  => 'required|max:255', 
            'type_doctor'  => 'required|max:255',
            'type_menu'  => 'required|max:255', 
            'date_doctor'  => 'required|date',
            'times'  => 'required|max:255', 
            'type_rawat'  => 'required|max:255', 
            'price' =>  'required|integer'
        ];
    }
}
