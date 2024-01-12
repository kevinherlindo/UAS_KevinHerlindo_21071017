<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_siswa'    => 'required',
            'alamat'        => 'required',
            //'email'       => [
            //'required',
            // Rule::unique('siswa','email')->ignore($this->id_siswa, 'id_siswa'),
            //'email'
            // ],
            'gender'        => 'required',
            'phone'         => 'required'
        ];
    }

    //ubah ke pesan indonesia
    public function messages(): array
    {
        return [
            'nama_siswa.required'   => ':attribute Tidak Boleh Kosong',
            'alamat.required'       => ':attribute Tidak Boleh Kosong',
            'gender.required'       => ':attribute Tidak Boleh Kosong',
            'phone.required'        => ':attribute Tidak Boleh Kosong',
            'id_siswa.unique'       => 'Sudah Ada',            
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_siswa'   => 'Nama Siswa',  
            'alamat'       => 'Alamat',  
            'gender'       => 'Gender',    
            'phone'        => 'Handphone',       
        ];
    }
}
