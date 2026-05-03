@extends('layouts.app')

@section('title', 'Tambah Laporan Barang')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Tambah Laporan Barang Baru</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pages.laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Nama Barang -->
                                <div class="col-md-6 mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang') }}" required autofocus>
                                    @error('nama_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" id="kategori"
                                        class="form-select @error('kategori') is-invalid @enderror">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>
                                            Elektronik</option>
                                        <option value="Dompet & Kartu" {{ old('kategori') == 'Dompet & Kartu' ? 'selected' : '' }}>Dompet & Kartu</option>
                                        <option value="Tas & Barang Pribadi" {{ old('kategori') == 'Tas & Barang Pribadi' ? 'selected' : '' }}>Tas & Barang Pribadi</option>
                                        <option value="Pakaian" {{ old('kategori') == 'Pakaian' ? 'selected' : '' }}>Pakaian
                                        </option>
                                        <option value="Aksesoris" {{ old('kategori') == 'Aksesoris' ? 'selected' : '' }}>
                                            Aksesoris</option>
                                        <option value="Dokumen" {{ old('kategori') == 'Dokumen' ? 'selected' : '' }}>Dokumen
                                        </option>
                                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Lokasi Ditemukan -->
                            <div class="mb-3">
                                <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="lokasi_ditemukan" id="lokasi_ditemukan"
                                    class="form-control @error('lokasi_ditemukan') is-invalid @enderror"
                                    value="{{ old('lokasi_ditemukan') }}"
                                    placeholder="Contoh: Gedung A Lantai 3, Perpustakaan, dll" required>
                                @error('lokasi_ditemukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Ditemukan -->
                            <div class="mb-3">
                                <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="tanggal_ditemukan" id="tanggal_ditemukan"
                                    class="form-control @error('tanggal_ditemukan') is-invalid @enderror"
                                    value="{{ old('tanggal_ditemukan', now()->format('Y-m-d')) }}" required>
                                @error('tanggal_ditemukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Foto Barang -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Barang</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Format: JPG, JPEG, PNG (Max 2MB)</small>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi Barang <span
                                        class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" rows="5"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Detail Tambahan (Admin Only) -->
                            @can('admin')
                            <div class="mb-4">
                                <label for="detail_admin" class="form-label">Detail Tambahan (Admin Only)</label>
                                <textarea name="detail_admin" id="detail_admin" rows="4"
                                    class="form-control @error('detail_admin') is-invalid @enderror"
                                    placeholder="Informasi detail tambahan yang hanya visible untuk admin (contoh: lokasi penyimpanan barang, kondisi spesifik, dll)">{{ old('detail_admin') }}</textarea>
                                <div class="form-text">Field ini hanya akan terlihat oleh admin dan tidak ditampilkan ke user biasa.</div>
                                @error('detail_admin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @endcan

                            <!-- Status (khusus admin) -->
                            <div class="mb-4">
                                <label for="status" class="form-label">Status Laporan</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" selected>Pending</option>
                                    <option value="diklaim">Diklaim</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pages.laporan.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection