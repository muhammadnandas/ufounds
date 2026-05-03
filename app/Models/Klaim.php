<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Klaim extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_klaim';
    
    protected $fillable = [
        'laporan_id',
        'user_id',
        'nama_pemilik',
        'deskripsi_klaim',
        'no_telepon',
        'bukti_kepemilikan',
        'tanggal_klaim',
        'status_klaim',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_klaim' => 'datetime',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serahTerima()
    {
        return $this->hasOne(SerahTerima::class, 'klaim_id', 'id_klaim');
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status_klaim) {
            'menunggu' => '<span class="badge bg-warning">Menunggu</span>',
            'diproses' => '<span class="badge bg-info">Diproses</span>',
            'diterima' => '<span class="badge bg-success">Diterima</span>',
            'ditolak' => '<span class="badge bg-danger">Ditolak</span>',
            'jadwal_diatur' => '<span class="badge bg-primary">Jadwal Diatur</span>',
            default => '<span class="badge bg-secondary">Unknown</span>',
        };
    }
}
