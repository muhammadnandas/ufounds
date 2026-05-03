@extends('layouts.app')

@section('title', 'Kelola Laporan Barang')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Kelola Laporan Barang Hilang & Ditemukan</h4>
            @can('user')
            <a href="{{ route('pages.laporan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Laporan
            </a>
            @endcan
        </div>

        <div class="row">
            @forelse($laporans as $laporan)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">

                        <!-- Foto Barang - UKURAN DISESUAIKAN -->
                        <div class="position-relative">
                            @if($laporan->foto)
                                <img src="{{ $laporan->foto_url }}" class="card-img-top" alt="{{ $laporan->nama_barang }}"
                                    style="height: 240px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                    style="height: 240px;">
                                    <i class="fas fa-image fa-4x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate mb-2">{{ $laporan->nama_barang }}</h5>

                            <p class="small text-muted mb-1">
                                <i class="fas fa-map-marker-alt"></i> {{ $laporan->lokasi_ditemukan }}
                            </p>
                            <p class="small text-muted mb-2">
                                <i class="fas fa-calendar"></i> {{ $laporan->tanggal_ditemukan->format('d M Y') }}
                            </p>

                            <div class="mb-2">
                                {!! $laporan->status_label !!}
                            </div>

                            <p class="card-text flex-grow-1 text-truncate" style="min-height: 50px;">
                                {{ Str::limit($laporan->deskripsi, 90) }}
                            </p>

                            <small class="text-muted">
                                Oleh: <strong>{{ $laporan->user->name ?? 'User' }}</strong>
                            </small>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0">
                            <div class="d-flex gap-2">
                                <a href="{{ route('pages.laporan.show', $laporan) }}" class="btn btn-primary btn-sm flex-fill">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('pages.laporan.edit', $laporan) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h5>Belum ada laporan barang</h5>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $laporans->links() }}
        </div>
    </div>
@endsection