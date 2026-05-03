<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('user')
            ->latest()
            ->paginate(12);
        
        // Variabel tambahan sesuai permintaanmu
        $laporanDitemukan = Laporan::with('user')
            ->where('status', 'ditemukan')   // sesuaikan dengan nama status di database kamu
            ->latest()
            ->get();   // atau ->paginate() jika ingin dipaginasi juga

        // Laporan milik user sendiri (untuk section "Laporan Saya")
        $userLaporans = Laporan::where('user_id', auth()->id())
            ->with('user')
            ->latest()
            ->get();

        return view('pages.dashboard', compact(
            'laporans', 
            'laporanDitemukan', 
            'userLaporans'
        ));
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function changeAvatar(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $path = "avatar/";
            $oldfile = $path.basename($user->avatar);
            Storage::disk('public')->delete($oldfile);
            $data['avatar'] = Storage::disk('public')->put($path, $request->file('avatar'));

            $user->update($data);
        }

        return redirect()->back();
    }

    public function removeAvatar()
    {
        $user = User::findOrFail(auth()->user()->id);

        $path = "avatar/";
        $oldfile = $path.basename($user->avatar);
        Storage::disk('public')->delete($oldfile);
        $data['avatar'] = NULL;

        $user->update($data);

        return redirect()->back();
    }
}
