<?php

namespace App\Http\Controllers;

use App\Models\Klaim;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class KlaimController extends Controller
{
    /**
     * 🔥 AJUKAN KLAIM (DARI BUTTON)
     */
    public function store(Request $request)
    {
        // Check if this is a simple dashboard claim (seeker) or detailed claim form
        if ($request->has('laporan_id') && !$request->has('nama_pemilik')) {
            // Dashboard claim with seeker description
            $request->validate([
                'laporan_id' => 'required|exists:laporans,id',
                'deskripsi_klaim' => 'required|string|max:1000',
            ]);

            // 🔥 CEK DUPLIKAT
            $cek = Klaim::where('laporan_id', $request->laporan_id)
                ->where('user_id', auth()->id())
                ->exists();

            if ($cek) {
                return back()->with('error', 'Kamu sudah mengajukan klaim.');
            }

            DB::beginTransaction();

            try {
                Klaim::create([
                    'laporan_id'    => $request->laporan_id,
                    'user_id'       => auth()->id(),
                    'deskripsi_klaim' => $request->deskripsi_klaim,
                    'tanggal_klaim' => now(),
                    'status_klaim'  => 'menunggu',
                ]);

                DB::commit();

                return redirect()->route('pages.klaim.index')
                    ->with('success', 'Klaim berhasil diajukan.');

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Gagal mengajukan klaim.');
            }
        } else {
            // Detailed claim form (for finder/admin)
            $request->validate([
                'laporan_id' => 'required|exists:laporans,id',
                'nama_pemilik' => 'required|string|max:255',
                'deskripsi_klaim' => 'required|string',
                'no_telepon' => 'required|string|max:15',
                'bukti_kepemilikan' => 'nullable|string',
            ]);

            // 🔥 CEK DUPLIKAT
            $cek = Klaim::where('laporan_id', $request->laporan_id)
                ->where('user_id', auth()->id())
                ->exists();

            if ($cek) {
                return back()->with('error', 'Kamu sudah mengajukan klaim.');
            }

            DB::beginTransaction();

            try {
                Klaim::create([
                    'laporan_id' => $request->laporan_id,
                    'user_id' => auth()->id(),
                    'nama_pemilik' => $request->nama_pemilik,
                    'deskripsi_klaim' => $request->deskripsi_klaim,
                    'no_telepon' => $request->no_telepon,
                    'bukti_kepemilikan' => $request->bukti_kepemilikan,
                    'tanggal_klaim' => now(),
                    'status_klaim' => 'menunggu',
                ]);

                DB::commit();

                return redirect()->route('pages.klaim.index')
                    ->with('success', 'Klaim berhasil diajukan.');

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Gagal mengajukan klaim.');
            }
        }
    }

    /**
     * CREATE FORM
     */
    public function create()
    {
        $laporans = Laporan::where('status', 'pending')->get();
        return view('pages.klaim.create', compact('laporans'));
    }

    /**
     * LIST KLAIM
     */
    public function index(Request $request)
    {
        $query = Klaim::with(['laporan', 'user']);

        if ($request->filled('status')) {
            $query->where('status_klaim', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_pemilik', 'like', "%{$request->search}%")
                  ->orWhereHas('laporan', function ($q2) use ($request) {
                      $q2->where('nama_barang', 'like', "%{$request->search}%");
                  });
            });
        }

        $klaims = $query->latest()->paginate(10);

        return view('pages.klaim.index', compact('klaims'));
    }

    /**
     * UPDATE KLAIM (FINDER/ADMIN)
     */
    public function update(Request $request, Klaim $klaim)
    {
        // Only allow update if user is the laporan creator (finder) or admin
        if (auth()->user()->role !== 'admin' && $klaim->laporan->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Different validation based on user role
        if (auth()->user()->role === 'admin') {
            $validated = $request->validate([
                'status_klaim' => ['required', Rule::in(['menunggu', 'diproses', 'diterima', 'ditolak', 'jadwal_diatur'])],
                'catatan_admin' => 'nullable|string',
                'nama_pemilik' => 'nullable|string|max:255',
                'deskripsi_klaim' => 'nullable|string',
                'no_telepon' => 'nullable|string|max:15',
                'bukti_kepemilikan' => 'nullable|string',
            ]);
        } else {
            // Finder can only edit claim details, not status
            $validated = $request->validate([
                'nama_pemilik' => 'required|string|max:255',
                'deskripsi_klaim' => 'required|string',
                'no_telepon' => 'required|string|max:15',
                'bukti_kepemilikan' => 'nullable|string',
            ]);
        }

        DB::beginTransaction();

        try {
            $klaim->update($validated);

            // 🔥 JIKA DITERIMA (ADMIN ONLY)
            if (auth()->user()->role === 'admin' && isset($validated['status_klaim']) && $validated['status_klaim'] === 'diterima') {

                // update status laporan
                $klaim->laporan->update(['status' => 'diklaim']);

                // 🔥 auto tolak klaim lain
                Klaim::where('laporan_id', $klaim->laporan_id)
                    ->where('id_klaim', '!=', $klaim->id_klaim)
                    ->update([
                        'status_klaim' => 'ditolak',
                        'catatan_admin' => 'Sudah ada klaim yang diterima'
                    ]);
            }

            DB::commit();

            return redirect()->route('pages.klaim.index')
                ->with('success', 'Klaim berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update');
        }
    }

    /**
     * UPDATE STATUS VIA AJAX
     */
    public function updateStatus(Request $request, Klaim $klaim)
    {
        $request->validate([
            'status_klaim' => 'required'
        ]);

        $klaim->update([
            'status_klaim' => $request->status_klaim
        ]);

        return response()->json([
            'success' => true,
            'badge' => $klaim->status_label
        ]);
    }

    /**
     * EDIT FORM
     */
    public function edit(Klaim $klaim)
    {
        // Only allow edit if user is the laporan creator (finder) or admin
        if (auth()->user()->role !== 'admin' && $klaim->laporan->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $klaim->load(['laporan', 'user']);
        return view('pages.klaim.edit', compact('klaim'));
    }

    /**
     * DETAIL
     */
    public function show(Klaim $klaim)
    {
        $klaim->load(['laporan', 'user']);
        return view('pages.klaim.show', compact('klaim'));
    }

    /**
     * HAPUS
     */
    public function destroy(Klaim $klaim)
    {
        $klaim->delete();
        return back()->with('success', 'Klaim dihapus');
    }
}