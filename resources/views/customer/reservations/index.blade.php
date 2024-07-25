@extends('adminlte::page')

@section('title', 'Manage Reservations')

@section('content_header')
    <h1>Manage Reservations</h1>
@stop

@section('content')
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Create Reservation</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Lapangan</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Total Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($reservations as $key => $reservation)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $reservation->lapangan->name }}</td>
                <td>{{ $reservation->start_time }}</td>
                <td>{{ $reservation->end_time }}</td>
                <td>{{ $reservation->total_price }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('reservations.show', $reservation->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop
