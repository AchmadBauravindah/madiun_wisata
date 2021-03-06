<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenginapanRequest extends FormRequest
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
            'nama' => 'required',
            'lokasi' => 'required',
            'gmap' => 'required',
            'harga' => 'required',
            'spesifikasi' => 'required',
            'imgdepan' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'imgkamar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'imgwc' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
