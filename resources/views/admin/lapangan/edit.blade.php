@extends('adminlte::page')

@section('title', 'Edit Lapangan')

@section('content_header')
    <h1>Edit Lapangan</h1>
@stop

@section('content')
    <form action="{{ route('lapangans.update', $lapangans->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $lapangans->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description">{{ $lapangans->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price_per_hour">Price per Hour</label>
            <input type="number" name="price_per_hour" class="form-control" id="price_per_hour" value="{{ $lapangans->price_per_hour }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
