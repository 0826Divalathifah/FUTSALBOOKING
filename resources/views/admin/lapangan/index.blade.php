@extends('adminlte::page')

@section('title', 'Manage Lapangan')

@section('content_header')
    <h1>Manage Lapangan</h1>
@stop

@section('content')
    <a href="{{ route('lapangans.create') }}" class="btn btn-primary">Create Lapangan</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price per Hour</th>
            <th width="280px">Action</th>
        </tr>
        @php $id = 0; @endphp
        @foreach ($lapangans as $field)
            <tr>
                <td>{{ ++$id }}</td>
                <td>{{ $field->name }}</td>
                <td>{{ $field->description }}</td>
                <td>{{ $field->price_per_hour }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('lapangans.show', $field->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('lapangans.edit', $field->id) }}">Edit</a>
                    <form action="{{ route('lapangans.destroy', $field->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop
