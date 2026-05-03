@extends('layouts.app')

@section('title', 'Edit Laporan - ' . $laporan->nama_barang)

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Edit Laporan Barang</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pages.laporan.update', $laporan) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang', $laporan->nama_barang) }}" required>
                                    @error('nama_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Elektronik" {{ old('kategori', $laporan->kategori) == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                        <option value="Dompet & Kartu" {{ old('kategori', $laporan->kategori) == 'Dompet & Kartu' ? 'selected' : '' }}>Dompet & Kartu</option>
                                        <option value="Tas & Barang Pribadi" {{ old('kategori', $laporan->kategori) == 'Tas & Barang Pribadi' ? 'selected' : '' }}>Tas & Barang Pribadi</option>
                                        <option value="Pakaian" {{ old('kategori', $laporan->kategori) == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                                        <option value="Aksesoris" {{ old('kategori', $laporan->kategori) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                        <option value="Dokumen" {{ old('kategori', $laporan->kategori) == 'Dokumen' ? 'selected' : '' }}>Dokumen</option>
                                        <option value="Lainnya" {{ old('kategori', $laporan->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="lokasi_ditemukan" id="lokasi_ditemukan"
                                    class="form-control @error('lokasi_ditemukan') is-invalid @enderror"
                                    value="{{ old('lokasi_ditemukan', $laporan->lokasi_ditemukan) }}" required>
                                @error('lokasi_ditemukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="tanggal_ditemukan" id="tanggal_ditemukan"
                                    class="form-control @error('tanggal_ditemukan') is-invalid @enderror"
                                    value="{{ old('tanggal_ditemukan', $laporan->tanggal_ditemukan->format('Y-m-d')) }}"
                                    required>
                                @error('tanggal_ditemukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Foto Saat Ini -->
                            @if($laporan->foto)
                                <div class="mb-3">
                                    <label class="form-label">Foto Saat Ini</label><br>
                                    <img src="{{ $laporan->foto_url }}" alt="Foto Lama" class="img-thumbnail"
                                        style="max-height: 180px;">
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="foto" class="form-label">Ganti Foto Barang (Opsional)</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi Barang <span
                                        class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" rows="5"
                                    class="form-control @error('deskripsi') is-invalid @enderror" required>
                                    {{ old('deskripsi', $laporan->deskripsi) }}
                                </textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">Status Laporan</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" {{ $laporan->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="diklaim" {{ $laporan->status == 'diklaim' ? 'selected' : '' }}>Diklaim
                                    </option>
                                    <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pages.laporan.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Update Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection