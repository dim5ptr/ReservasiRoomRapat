<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::all();
        return view('ruang.index', compact('ruang'));
    }

    public function create()
    {
        return view('ruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        Ruang::create($request->all());

        return redirect()->route('ruang.index')
                         ->with('success', 'Ruang created successfully.');
    }

    public function show(Ruang $ruang)
    {
        return view('ruang.show', compact('ruang'));
    }

    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', compact('ruang'));
    }

    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $ruang->update($request->all());

        return redirect()->route('ruang.index')
                         ->with('success', 'Ruang updated successfully.');
    }

    public function destroy(Ruang $ruang)
    {
        $ruang->delete();

        return redirect()->route('ruang.index')
                         ->with('success', 'Ruang deleted successfully.');
    }
}
