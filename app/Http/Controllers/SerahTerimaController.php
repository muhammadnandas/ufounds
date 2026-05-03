<?php

namespace App\Http\Controllers;

use App\Models\Klaim;
use App\Models\SerahTerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SerahTerimaController extends Controller
{
    /**
     * Daftar Serah Terima untuk Penemu (yang perlu diurus)
     */
    public function index()
    {
        $serahTerimas = SerahTerima::with(['klaim.laporan', 'pemilik'])
        ->where('penemu_id', Auth::id())
        ->where('status', 'dijadwalkan')
        ->latest()
        ->get();

    return view('pages.serah_terima.index', compact('serahTerimas'));
    }

    /**
     * Form untuk mengatur jadwal serah terima (show list of claims)
     */
    public function create()
    {
        // Get claims with status 'diproses' that don't have schedule yet
        $klaims = Klaim::with(['laporan', 'user'])
            ->where('status_klaim', 'diproses')
            ->whereDoesntHave('serahTerima')
            ->latest()
            ->get();

        return view('pages.serah_terima.create', compact('klaims'));
    }

    /**
     * Form untuk mengatur jadwal serah terima (direct from klaim)
     */
    public function createWithKlaim(Klaim $klaim)
    {
        // Cek apakah klaim sudah diproses oleh admin
        if ($klaim->status_klaim !== 'diproses') {
            abort(403, 'Klaim ini belum diproses oleh admin atau status sudah berubah.');
        }

        // Cek apakah jadwal serah terima sudah ada untuk klaim ini
        $existingSchedule = SerahTerima::where('klaim_id', $klaim->id_klaim)->first();
        if ($existingSchedule) {
            abort(403, 'Jadwal serah terima sudah diatur untuk klaim ini.');
        }

        return view('pages.serah_terima.create', compact('klaim'));
    }

    /**
     * Simpan jadwal serah terima
     */
    public function store(Request $request, Klaim $klaim)
    {
        // Cek apakah klaim masih dalam status 'diproses'
        if ($klaim->status_klaim !== 'diproses') {
            return back()->with('error', 'Status klaim sudah berubah. Tidak dapat mengatur jadwal.');
        }

        // Cek apakah jadwal serah terima sudah ada untuk klaim ini
        $existingSchedule = SerahTerima::where('klaim_id', $klaim->id_klaim)->first();
        if ($existingSchedule) {
            return back()->with('error', 'Jadwal serah terima sudah diatur untuk klaim ini.');
        }

        $request->validate([
            'tanggal_serah_terima' => 'required|date|after:now',
            'lokasi_serah_terima'   => 'required|string|max:255',
            'catatan'               => 'nullable|string',
        ]);

        SerahTerima::create([
            'klaim_id'              => $klaim->id_klaim,
            'penemu_id'             => Auth::id(),
            'pemilik_id'            => $klaim->user_id,
            'tanggal_serah_terima'  => $request->tanggal_serah_terima,
            'lokasi_serah_terima'   => $request->lokasi_serah_terima,
            'catatan'               => $request->catatan,
            'status'                => 'dijadwalkan',
        ]);

        // Update status klaim
        $klaim->update(['status_klaim' => 'jadwal_diatur']);

        return redirect()->route('serah-terima.index')
                         ->with('success', 'Jadwal serah terima berhasil diatur!');
    }

    /**
     * Jadwal Serah Terima untuk Pemilik
     */
    public function mySchedule()
    {
        $jadwals = SerahTerima::with(['klaim.laporan', 'penemu'])
            ->where('pemilik_id', Auth::id())
            ->latest()
            ->get();

        return view('pages.serah_terima.my_schedule', compact('jadwals'));
    }
}