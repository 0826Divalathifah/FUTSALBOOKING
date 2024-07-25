@extends('adminlte::page')

@section('title', 'Show Lapangan')

@section('content_header')
    <h1>Show Lapangan</h1>
@stop

@section('content')
    <div class="form-group">
        <strong>Name:</strong>
        {{ $lapangan->name }}
    </div>
    <div class="form-group">
        <strong>Description:</strong>
        {{ $lapangan->description }}
    </div>
    <div class="form-group">
        <strong>Price per Hour:</strong>
        {{ $lapangan->price_per_hour }}
    </div>
    <a class="btn btn-primary" href="{{ route('lapangans.index') }}">Back</a>
@stop
