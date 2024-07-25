@extends('adminlte::page')

@section('title', 'Create Lapangan')

@section('content_header')
    <h1>Create Lapangan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lapangans.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price_per_hour">Price per Hour</label>
                    <input type="number" name="price_per_hour" class="form-control" id="price_per_hour" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
