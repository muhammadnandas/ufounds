@extends('layouts.app')

@section('title', 'Daftar Serah Terima')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-handshake"></i> Daftar Serah Terima yang Perlu Diurus
            </h4>
            <a href="{{ route('serah-terima.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Buat Jadwal Baru
            </a>
        </div>

        @if($serahTerimas->isEmpty())
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                <h5>Belum ada jadwal serah terima yang perlu diatur</h5>
                <p class="text-muted">Jadwal akan muncul setelah Anda menyetujui klaim pemilik.</p>
            </div>
        @else
            <div class="row">
                @foreach($serahTerimas as $serah)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $serah->klaim->laporan->nama_barang ?? 'Barang Tidak Diketahui' }}
                                </h5>
                                
                                <p class="small text-muted mb-2">
                                    <strong>Pemilik:</strong> {{ $serah->pemilik->name ?? '-' }}
                                </p>

                                <p class="mb-1">
                                    <i class="fas fa-calendar-alt"></i> 
                                    {{ $serah->tanggal_serah_terima->format('d M Y • H:i') }}
                                </p>
                                <p class="mb-3">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    {{ $serah->lokasi_serah_terima }}
                                </p>

                                @if($serah->catatan)
                                    <p class="small text-muted">
                                        <strong>Catatan:</strong> {{ Str::limit($serah->catatan, 80) }}
                                    </p>
                                @endif

                                <span class="badge bg-warning">Menunggu Serah Terima</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection