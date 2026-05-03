@extends('layouts.app')

@section('title', 'Detail Klaim')

@section('content')
<div class="container">

    <h4 class="mb-3">Detail Klaim</h4>

    <div class="card">
        <div class="card-body">

            <p><strong>Nama Barang:</strong> {{ $klaim->laporan->nama_barang }}</p>
            <p><strong>Pelapor:</strong> {{ $klaim->user->name }}</p>
            <p><strong>Status:</strong> {!! $klaim->status_label !!}</p>
            <p><strong>Tanggal Klaim:</strong> {{ $klaim->tanggal_klaim }}</p>
            
            @if($klaim->deskripsi_klaim)
                <div class="mb-3">
                    <strong>Deskripsi Klaim (Seeker):</strong>
                    <div class="alert alert-info mt-2">
                        {{ $klaim->deskripsi_klaim }}
                    </div>
                </div>
            @endif

            @if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id())
                @if($klaim->nama_pemilik)
                    <p><strong>Nama Pemilik:</strong> {{ $klaim->nama_pemilik }}</p>
                @endif
                @if($klaim->no_telepon)
                    <p><strong>No Telepon:</strong> {{ $klaim->no_telepon }}</p>
                @endif
                @if($klaim->bukti_kepemilikan)
                    <div class="mb-3">
                        <strong>Bukti Kepemilikan:</strong>
                        <div class="alert alert-warning mt-2">
                            {{ $klaim->bukti_kepemilikan }}
                        </div>
                    </div>
                @endif
            @endif

            @if($klaim->catatan_admin)
                <div class="mb-3">
                    <strong>Catatan Admin:</strong>
                    <div class="alert alert-secondary mt-2">
                        {{ $klaim->catatan_admin }}
                    </div>
                </div>
            @endif

            <a href="{{ route('pages.klaim.index') }}" class="btn btn-secondary">Kembali</a>

            @if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id())
                <a href="{{ route('pages.klaim.edit', $klaim) }}" class="btn btn-warning">
                    {{ auth()->user()->role === 'admin' ? 'Edit Status' : 'Edit Klaim' }}
                </a>
            @endif

            @if($klaim->status_klaim === 'diproses' && (auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id()))
                <a href="{{ route('serah-terima.create', $klaim) }}" class="btn btn-success">
                    <i class="fas fa-calendar-check"></i> Atur Jadwal Serah Terima
                </a>
            @endif

        </div>
    </div>
</div>
@endsection