<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;   // ← INI YANG DITAMBAHKAN

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_barang',
        'deskripsi',
        'detail_admin',
        'kategori',
        'lokasi_ditemukan',
        'tanggal_ditemukan',
        'foto',
        'status',
    ];

    protected $casts = [
        'tanggal_ditemukan' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor untuk URL Foto
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return Storage::url($this->foto);   // Contoh: /storage/laporan/...
        }

        return asset('assets/img/no-image.png'); // gambar default
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'pending' => '<span class="badge bg-warning">Pending</span>',
            'diklaim' => '<span class="badge bg-info">Diklaim</span>',
            'selesai' => '<span class="badge bg-success">Selesai</span>',
            default => '<span class="badge bg-secondary">Unknown</span>',
        };
    }
}