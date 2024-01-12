<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; //aktifkan true leweh
    }

    public function rules(): array
    {
        return [
            'id_siswa'      => 'required|unique:siswa,id_siswa|min:2|max:8',
            'nama_siswa'    => 'required',
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
            'id_siswa.required'     => ':attribute Tidak Boleh Kosong',
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
            'id_siswa'     => 'ID Siswa',
            'nama_siswa'   => 'Nama Siswa',  
            'alamat'       => 'Alamat',  
            'gender'       => 'Gender',    
            'phone'        => 'Handphone',       
        ];
    }


}
