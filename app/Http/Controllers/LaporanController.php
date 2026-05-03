<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = Laporan::with('user')
            ->latest()
            ->paginate(12);

        return view('pages.laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'lokasi_ditemukan' => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '-' . Str::slug($request->nama_barang) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('laporan', $filename, 'public');
            $validated['foto'] = $path;
        }

        $validated['user_id'] = auth()->id();

        Laporan::create($validated);

        return redirect()->route('pages.laporan.index')
            ->with('success', 'Laporan barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        $laporan->load('user');
        return view('pages.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        $laporan->load('user');
        return view('pages.laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'lokasi_ditemukan' => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'status' => 'required|in:pending,diklaim,selesai',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle Upload Foto Baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '-' . Str::slug($request->nama_barang) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('laporan', $filename, 'public');
            $validated['foto'] = $path;
        }

        $laporan->update($validated);

        return redirect()->route('pages.laporan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        // Hapus foto jika ada
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('pages.laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}