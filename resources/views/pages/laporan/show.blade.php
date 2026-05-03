@extends('layouts.app')

@section('title', 'Detail Laporan - ' . $laporan->nama_barang)

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5>Detail Laporan Barang</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Kolom Kiri - Foto -->
                    <div class="col-md-5 text-center">
                        @if($laporan->foto)
                            <img src="{{ $laporan->foto_url }}" class="img-fluid rounded shadow-sm"
                                style="max-height: 400px; object-fit: contain;" alt="">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                style="height: 350px;">
                                <i class="fas fa-image fa-5x text-muted"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Kolom Kanan - Informasi -->
                    <div class="col-md-7">
                        <h4>{{ $laporan->nama_barang }}</h4>
                        <hr>

                        <table class="table table-borderless">
                            <tr>
                                <th width="140">Status</th>
                                <td>{!! $laporan->status_label !!}</td>
                            </tr>
                            <tr>
                                <th>Penemu</th>
                                <td>{{ $laporan->user->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi Ditemukan</th>
                                <td>{{ $laporan->lokasi_ditemukan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Ditemukan</th>
                                <td>{{ $laporan->tanggal_ditemukan->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $laporan->kategori ?? '-' }}</td>
                            </tr>
                        </table>

                        <h6 class="mt-4">Deskripsi Barang</h6>
                        <p class="border p-3 bg-light rounded">{{ $laporan->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white">
                <a href="{{ route('pages.laporan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <a href="{{ route('pages.laporan.edit', $laporan) }}" class="btn btn-warning">
                    Edit Laporan
                </a>

                <form action="{{ route('pages.laporan.destroy', $laporan) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection