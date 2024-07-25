<?php
namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price_per_hour' => 'required|numeric',
        ]);

        Lapangan::create($request->all());

        return redirect()->route('lapangans.index')
                         ->with('success', 'Lapangan created successfully.');
    }

    public function show($id)
    {
        $lapangan = Lapangan::find($id);
        return view('admin.lapangans.show', compact('lapangan'));
    }

    public function edit($id)
    {
        $lapangans = Lapangan::find($id);
        return view('admin.lapangan.edit', compact('lapangans'));
    }

    public function update(Request $request, $id)
    {
        $lapangans = Lapangan::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price_per_hour' => 'required|numeric',
        ]);

        $lapangans->update($request->all());

        return redirect()->route('lapangans.index')
                         ->with('success', 'Lapangan updated successfully.');
    }

    public function destroy($id)
    {
        $lapangans = Lapangan::find($id);
        $lapangans->delete();

        return redirect()->route('lapangans.index')
                         ->with('success', 'Lapangan deleted successfully.');
    }
}
