@extends('layouts.app')

@section('title', 'Dashboard')
@section('desc', 'Halaman Dashboard')

@section('content')

    {{-- Dashboard Admin --}}
    @can('admin')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\Models\User::where('role', '!=', 'admin')->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    {{-- Dashboard User --}}
    @can('user')
        @php
            $userRole = auth()->user()->role;
            $userLaporans = \App\Models\Laporan::where('user_id', auth()->id())
                            ->latest()
                            ->get();
        @endphp

        {{-- SEEKER SECTION --}}
        @if($userRole === 'user')
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="text-center mb-3">🔍 Seeker - Cari Barang Hilang</h5>
                </div>
            </div>

            <div class="row">
                @forelse($laporans as $laporan)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">

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
                                    {!! $laporan->status_label ?? '<span class="badge bg-secondary">Tidak diketahui</span>' !!}
                                </div>

                                <p class="card-text flex-grow-1 text-truncate" style="min-height: 50px;">
                                    {{ Str::limit($laporan->deskripsi, 90) }}
                                </p>

                                <small class="text-muted">
                                    Oleh: <strong>{{ $laporan->user->name ?? 'User' }}</strong>
                                </small>
                            </div>

                            <div class="card-footer bg-white border-0 pt-0">
                                @php
                                    $sudah = \App\Models\Klaim::where('laporan_id', $laporan->id)
                                        ->where('status_klaim', 'diterima')
                                        ->exists();
                                @endphp

                                @if(!$sudah)
                                    <button type="button" class="btn btn-success w-100" 
                                            data-toggle="modal" data-target="#klaimModal{{ $laporan->id }}">
                                        🎯 Ajukan Klaim
                                    </button>
                                @else
                                    <button class="btn btn-secondary w-100" disabled>
                                        ✅ Sudah Diklaim
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h5>Belum ada laporan barang yang bisa diklaim</h5>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $laporans->links() }}
            </div>
        @endif   {{-- End Seeker Section --}}

        {{-- FINDER SECTION --}}
        @if($userRole === 'user' && $userLaporans->count() > 0)
            <div class="row mb-4 mt-5">
                <div class="col-12">
                    <h5 class="text-center mb-3">📦 Finder - Laporan Saya</h5>
                </div>
            </div>

            <div class="row">
                @forelse($userLaporans as $laporan)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">

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
                                    {!! $laporan->status_label ?? '<span class="badge bg-secondary">Tidak diketahui</span>' !!}
                                </div>

                                <p class="card-text flex-grow-1 text-truncate" style="min-height: 50px;">
                                    {{ Str::limit($laporan->deskripsi, 90) }}
                                </p>

                                <small class="text-muted">
                                    <span class="badge bg-primary">Laporan Saya</span>
                                </small>
                            </div>

                            <div class="card-footer bg-white border-0 pt-0">
                                <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-warning btn-sm w-100">
                                    ✏️ Edit Laporan
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-box fa-3x text-muted mb-3"></i>
                        <h5>Anda belum membuat laporan barang</h5>
                        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
                            📝 Buat Laporan Baru
                        </a>
                    </div>
                @endforelse
            </div>
        @endif   {{-- End Finder Section --}}

        {{-- EMPTY STATE --}}
        @if($userRole === 'user' && $laporans->count() === 0 && $userLaporans->count() === 0)
            <div class="col-12 text-center py-5">
                <i class="fas fa-home fa-3x text-muted mb-3"></i>
                <h5>Selamat Datang! 🎉</h5>
                <p class="text-muted">Mulai dengan membuat laporan barang temuan atau lihat barang yang bisa diklaim.</p>
                <div class="mt-3">
                    <a href="{{ route('laporan.create') }}" class="btn btn-primary me-2">📝 Buat Laporan</a>
                    <a href="{{ route('pages.laporan.index') }}" class="btn btn-outline-primary">🔍 Lihat Barang</a>
                </div>
            </div>
        @endif

    @endcan   {{-- ← Penutup @can('user') --}}

    {{-- ==================== MODALS KLAIM - TANPA BACKDROP ==================== --}}
    @can('user')
        @if($userRole === 'user')
            @foreach($laporans as $laporan)
                @php
                    $sudah = \App\Models\Klaim::where('laporan_id', $laporan->id)
                        ->where('status_klaim', 'diterima')
                        ->exists();
                @endphp

                @if(!$sudah)
                    <!-- Modal tanpa backdrop -->
                    <div class="modal fade" 
                         id="klaimModal{{ $laporan->id }}" 
                         tabindex="-1" 
                         role="dialog" 
                         aria-labelledby="klaimModalLabel{{ $laporan->id }}" 
                         aria-hidden="true"
                         data-backdrop="false"
                         data-keyboard="true"
                         style="z-index: 1060 !important;">
                        
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="klaimModalLabel{{ $laporan->id }}">
                                        Ajukan Klaim - {{ $laporan->nama_barang }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('klaim.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Detail Barang *</label>
                                            <textarea name="deskripsi_klaim" 
                                                      class="form-control" 
                                                      rows="5" 
                                                      required 
                                                      placeholder="Deskripsikan ciri-ciri barang yang Anda klaim..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Ajukan Klaim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endcan
@endsection