@extends('adminlte::page')

@section('title', 'Show Reservation')

@section('content_header')
    <h1>Show Reservation</h1>
@stop

@section('content')
    <div class="form-group">
        <strong>Lapangan:</strong>
        {{ $reservation->lapangan->name }}
    </div>
    <div class="form-group">
        <strong>Start Time:</strong>
        {{ $reservation->start_time }}
    </div>
    <div class="form-group">
        <strong>End Time:</strong>
        {{ $reservation->end_time }}
    </div>
    <div class="form-group">
        <strong>Total Price:</strong>
        {{ $reservation->total_price }}
    </div>
    <a class="btn btn-primary" href="{{ route('reservations.index') }}">Back</a>
@stop
