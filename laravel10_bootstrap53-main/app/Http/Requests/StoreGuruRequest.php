<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuruRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_guru'      => 'required|unique:guru,id_guru|min:1|max:8',
            'nama_guru'    => 'required',
            'alamat'        => 'required',
            //'email'         => 'required|unique:siswa,email',
            'gender'        => 'required',
            'phone'         => 'required'
        ];
    }

    //ubah ke pesan indonesia
    public function messages(): array
    {
        return [
            'id_guru.required'     => ':attribute Tidak Boleh Kosong',
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
            'id_guru'     => 'ID Guru',
            'nama_guru'   => 'Nama Guru',  
            'alamat'       => 'Alamat',  
            'gender'       => 'Gender',    
            'phone'        => 'Handphone',       
        ];
    }
}
