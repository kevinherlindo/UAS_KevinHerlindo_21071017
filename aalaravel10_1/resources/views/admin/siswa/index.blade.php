@extends('admin.layout.app')

@section('heading', 'Data Siswa')

@section('right_top_button')
<a href="{{ route('siswa_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

<table class="table table-bordered table-sm" id="example1">
<thead>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @php $i=0; @endphp
    @foreach($siswa as $row)
    @php $i++; @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>                                  
        <td>{{ $row->nis }}</td>
        <td>{{ $row->nama_siswa }}</td>
        <td>{{ $row->alamat }}</td>
        <td class="pt_10 pb_10">
            <a href="{{ route('siswa_edit',$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('siswa_delete',$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection