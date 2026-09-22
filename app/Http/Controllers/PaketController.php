<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();

        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'harga_per_kg' => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
        ]);

        $validated['menggunakan_setrika'] = $request->has('menggunakan_setrika');

        Paket::create($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket laundry berhasil ditambahkan.');
    }

    public function show(Paket $paket)
    {
        return view('paket.show', compact('paket'));
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'harga_per_kg' => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
        ]);

        $validated['menggunakan_setrika'] = $request->has('menggunakan_setrika');

        $paket->update($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Data paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket laundry berhasil dihapus.');
    }
}
