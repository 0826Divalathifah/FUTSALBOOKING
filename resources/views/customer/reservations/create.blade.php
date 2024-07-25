@extends('adminlte::page')

@section('title', 'Create Reservation')

@section('content_header')
    <h1>Create Reservation</h1>
@stop

@section('content')
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="lapangan_id">Lapangan</label>
            <select name="lapangan_id" class="form-control" id="lapangan_id" required>
                @foreach ($lapangan as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" id="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" id="end_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
