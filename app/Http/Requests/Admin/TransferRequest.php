<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'transfer_id' => 'required|exists:transactions,id',
            'image' => 'required|image',
            'bank' =>' required|max:255',
            'nama' =>' required|max:255',
            'nomor' =>' required|max:255', 
            'total' =>' required|max:255', 
        ];
    }
}
