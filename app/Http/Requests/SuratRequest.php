<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest
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
            'no_surat' => 'required|unique:surats',
            'tipe_surat' => 'required',
            'perihal' => 'required',
            'tanggal' => 'required',
            'pengirim' => 'required',
            'penerima' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_surat.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
