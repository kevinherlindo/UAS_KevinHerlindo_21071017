<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuruRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_guru'    => 'required',
            'alamat'        => 'required',
            //'email'       => [
            //'required',
            // Rule::unique('siswa','email')->ignore($this->id_guru, 'id_guru'),
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
            'nama_guru.required'   => ':attribute Tidak Boleh Kosong',
            'alamat.required'       => ':attribute Tidak Boleh Kosong',
            'gender.required'       => ':attribute Tidak Boleh Kosong',
            'phone.required'        => ':attribute Tidak Boleh Kosong',
            'id_guru.unique'       => 'Sudah Ada',            
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_guru'   => 'Nama Siswa',  
            'alamat'       => 'Alamat',  
            'gender'       => 'Gender',    
            'phone'        => 'Handphone',       
        ];
    }
}
