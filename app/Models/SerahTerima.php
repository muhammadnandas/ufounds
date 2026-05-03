<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerahTerima extends Model
{
    use HasFactory;

    protected $table = 'serah_terima';

    protected $fillable = [
        'klaim_id',
        'penemu_id',
        'pemilik_id',
        'tanggal_serah_terima',
        'lokasi_serah_terima',
        'catatan',
        'status'
    ];

    protected $casts = [
        'tanggal_serah_terima' => 'datetime',
    ];

    // Relationships
    public function klaim()
    {
        return $this->belongsTo(Klaim::class);
    }

    public function penemu()
    {
        return $this->belongsTo(User::class, 'penemu_id');
    }

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik_id');
    }

    public function laporan()
    {
        return $this->hasOneThrough(Laporan::class, Klaim::class);
    }
}