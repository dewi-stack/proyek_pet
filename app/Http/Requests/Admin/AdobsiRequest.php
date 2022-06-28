<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdobsiRequest extends FormRequest
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
            'image' => 'required|image',
            'nama' =>' required|max:255',
            'email' =>' required|max:255', 
            'alamat' =>' required|max:255', 
            'deskripsi' => 'required',
            'jenis'  => 'required|max:255', 
            
        ];
    }
}
