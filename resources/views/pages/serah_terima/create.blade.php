@extends('layouts.app')

@section('title', 'Atur Serah Terima')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                @if(isset($klaims))
                    <!-- List of claims to select -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-handshake"></i> Pilih Klaim untuk Atur Jadwal
                            </h4>
                        </div>
                        
                        <div class="card-body">
                            @if($klaims->isEmpty())
                                <div class="alert alert-info text-center py-5">
                                    <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                    <h5>Tidak ada klaim yang bisa dijadwalkan</h5>
                                    <p class="text-muted">Klaim dengan status 'Diproses' yang belum memiliki jadwal akan muncul di sini.</p>
                                </div>
                            @else
                                <div class="list-group">
                                    @foreach($klaims as $klaim)
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $klaim->laporan->nama_barang ?? 'Barang Tidak Diketahui' }}</h5>
                                                <small>{!! $klaim->status_label !!}</small>
                                            </div>
                                            <p class="mb-1"><strong>Pemilik:</strong> {{ $klaim->user->name ?? '-' }}</p>
                                            <p class="mb-1 small text-muted">{{ Str::limit($klaim->deskripsi_klaim, 100) }}</p>
                                            <a href="{{ route('serah-terima.create.with-klaim', $klaim) }}" class="btn btn-sm btn-success mt-2">
                                                <i class="fas fa-calendar-check"></i> Atur Jadwal
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="mt-3">
                                <a href="{{ route('serah-terima.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif(isset($klaim))
                    <!-- Form for specific claim -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-handshake"></i> Atur Jadwal Serah Terima
                            </h4>
                        </div>
                        
                        <div class="card-body">
                            
                            <!-- Informasi Barang & Pemilik -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>Barang yang Diklaim</h5>
                                    <p class="mb-1"><strong>{{ $klaim->laporan->nama_barang ?? '-' }}</strong></p>
                                    <p class="small text-muted">
                                        Lokasi Ditemukan: {{ $klaim->laporan->lokasi_ditemukan }}<br>
                                        Tanggal Ditemukan: {{ optional($klaim->laporan->tanggal_ditemukan)->format('d M Y') }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Pemilik Klaim</h5>
                                    <p class="mb-1"><strong>{{ $klaim->user->name ?? 'Pemilik' }}</strong></p>
                                    <p class="small text-muted">{{ $klaim->deskripsi_klaim }}</p>
                                </div>
                            </div>

                            <hr>

                            <form action="{{ route('serah-terima.store', $klaim) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Tanggal & Waktu Serah Terima <span class="text-danger">*</span></label>
                                        <input type="datetime-local" 
                                               name="tanggal_serah_terima" 
                                               class="form-control @error('tanggal_serah_terima') is-invalid @enderror" 
                                               required>
                                        @error('tanggal_serah_terima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Lokasi Serah Terima <span class="text-danger">*</span></label>
                                        <select name="lokasi_serah_terima" 
                                                class="form-control @error('lokasi_serah_terima') is-invalid @enderror" 
                                                required>
                                            <option value="">Pilih Lokasi...</option>
                                            <option value="Gedung Fasilkom Lantai 7">Gedung Fasilkom Lantai 7</option>
                                            <option value="Pos Keamanan Kampus">Pos Keamanan Kampus</option>
                                            <option value="Ruang UKM">Ruang UKM</option>
                                            <option value="Perpustakaan">Perpustakaan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('lokasi_serah_terima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Catatan Tambahan (Opsional)</label>
                                    <textarea name="catatan" class="form-control" rows="4" 
                                        placeholder="Contoh: Mohon bawa identitas asli sebagai bukti kepemilikan..."></textarea>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <a href="{{ route('serah-terima.create') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-calendar-check"></i> Atur Jadwal Serah Terima
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection