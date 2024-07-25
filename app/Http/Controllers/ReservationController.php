<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Lapangan;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('lapangan')->get();
        return view('customer.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $lapangan = Lapangan::all();
        return view('customer.reservations.create', compact('lapangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
            'start_time.required' => 'The start time field is required.',
            'end_time.required' => 'The end time field is required.',
            'end_time.after' => 'The end time must be a date after start time.',
        ]);

        try {
            $lapangan = Lapangan::findOrFail($request->lapangan_id);
        } catch (\Exception $e) {
            return back()->withError('Lapangan not found.');
        }

        $total_price = $lapangan->price_per_hour * ((strtotime($request->end_time) - strtotime($request->start_time)) / 3600);

        Reservation::create([
            'user_id' => auth()->id(),
            'lapangan_id' => $request->lapangan_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total_price,
        ]);

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation created successfully.');
    }

    public function show(Reservation $reservation)
    {
        return view('customer.reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $lapangan = Lapangan::all();
        return view('customer.reservations.edit', compact('reservation', 'lapangan'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'lapangan_id' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
            'start_time.required' => 'The start time field is required.',
            'end_time.required' => 'The end time field is required.',
            'end_time.after' => 'The end time must be a date after start time.',
        ]);

        try {
            $lapangan = Lapangan::findOrFail($request->lapangan_id);
        } catch (\Exception $e) {
            return back()->withError('Lapangan not found.');
        }

        $total_price = $lapangan->price_per_hour * ((strtotime($request->end_time) - strtotime($request->start_time)) / 3600);

        $reservation->update([
            'lapangan_id' => $request->lapangan_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total_price,
        ]);

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation deleted successfully.');
    }
}
