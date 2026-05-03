@extends('layouts.app')

@section('title', 'Hapus Laporan')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-danger">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Konfirmasi Penghapusan</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <i class="fas fa-exclamation-triangle fa-4x text-danger mb-3"></i>
                            <h5>Apakah Anda yakin ingin menghapus laporan ini?</h5>
                            <p class="text-muted">
                                <strong>{{ $laporan->nama_barang }}</strong><br>
                                Lokasi: {{ $laporan->lokasi_ditemukan }} •
                                Tanggal: {{ $laporan->tanggal_ditemukan->format('d M Y') }}
                            </p>
                        </div>

                        <div class="alert alert-warning">
                            <small>
                                <strong>Perhatian:</strong> Data yang sudah dihapus tidak dapat dikembalikan!
                            </small>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('pages.laporan.show', $laporan) }}" class="btn btn-secondary">
                            Batal
                        </a>

                        <form action="{{ route('pages.laporan.destroy', $laporan) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Ya, Hapus Laporan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection