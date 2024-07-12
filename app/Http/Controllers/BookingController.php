<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $bookings = Booking::all(); // Retrieve bookings data from your database
        return view('bookings.create', compact('bookings'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'ruang' => 'required|string',
            'tambahan_fasilitas' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
        ]);

        Booking::create($request->all());

        return redirect()->route('dashboard')
                         ->with('success', 'Reservasi berhasil dibuat. Kami akan menghubungi Anda segera.');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'phone' => 'required|string',
            'date' => 'required|date',
            'fasilitas_tambahan' => 'nullable|string',
            'jumlah' => 'required|integer',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'name' => $request->nama,
            'phone' => $request->phone,
            'date' => $request->date,
            'ruang' => 'medium',
            'fasilitas_tambahan' => $request->fasilitas_tambahan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index');
    }
}
