@extends('admin.layout.app')

@section('heading', 'Edit Golongan Darah')

@section('right_top_button')
<a href="{{ route('admin_goldarah_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_goldarah_update',$goldarah_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">                                                             
                                <div class="mb-4">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $goldarah_data->nama }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <textarea name="jenis_kelamin" class="form-control h_100" cols="30" rows="10">{{ $goldarah_data->jenis_kelamin }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control snote" cols="30" rows="10">{{ $goldarah_data->alamat }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection