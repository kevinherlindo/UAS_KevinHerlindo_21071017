@extends('layout.main')
@section('content')

<h1>Tabel Nilai</h1>
<div class="card">
<div>
    <a class="btn btn-primary btn-sm" href="{{ route('cetak_nilai') }}" target="_BLANK">Cetak Data Siswa</a>
  </div>
        <div class="card-body">   
            <table class="table table-sm table-stripped table-bordered">
                <thead>
            <tr>
                <td>No</td>
                <td>Nama Guru</td>
                <td>Nama Siswa</td>
                <td>Nama Kurikulum</td>
                <td>Aksi</td>
                <td>Delete</td>
            </tr>
            </thead>
            @foreach ($nilai as $rows)
            <tbody>
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $rows->guru->nama_guru }}</td>
                    <td>{{ $rows->siswa->nama_siswa }}</td>
                    <td>{{ $rows->kurikulum->nama_kurikulum }} </td>
                    
                    <td>
                        <a href="{{ route('kurikulum.edit', $rows->id) }}">Edit</a>                                      
                    </td>
                    <td> 
                    <form action="{{ route('kurikulum.destroy', $rows->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Del</button>
                        </form>  
                    </td>
                 </tr>   
            @endforeach
            </tbody>
            </table>
        </div>
</div>

@endsection