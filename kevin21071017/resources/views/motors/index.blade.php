@extends('motors.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Jaya Abadi Motor</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('motors.create') }}"> Create New Motor</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Merek</th>
        <th>kategori</th>
        <th>Harga</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($motors as $motor)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $motor->nama }}</td>
        <td>{{ $motor->merek }}</td>
        <td>{{ $motor->kategori }}</td>
        <td>{{ $motor->harga }}</td>
        <td>
            <form action="{{ route('motors.destroy',$motor->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('motors.show',$motor->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('motors.edit',$motor->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $motors->links() !!}

@endsection