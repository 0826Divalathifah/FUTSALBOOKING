@extends('adminlte::page')

@section('title', 'Edit Reservation')

@section('content_header')
    <h1>Edit Reservation</h1>
@stop

@section('content')
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="lapangan_id">Lapangan</label>
            <select name="lapangan_id" class="form-control" id="lapangan_id" required>
                @foreach ($lapangan as $field)
                    <option value="{{ $field->id }}" @if($field->id == $reservation->lapangan_id) selected @endif>{{ $field->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" id="start_time" value="{{ $reservation->start_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" id="end_time" value="{{ $reservation->end_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
