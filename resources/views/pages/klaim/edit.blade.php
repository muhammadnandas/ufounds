@extends('layouts.app')

@section('title', 'Edit Klaim')

@section('content')
<div class="container">

    <h4 class="mb-3">
        {{ auth()->user()->role === 'admin' ? 'Edit Status Klaim' : 'Edit Informasi Klaim' }}
    </h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('pages.klaim.update', $klaim) }}" method="POST">
                @csrf @method('PUT')

                @if(auth()->user()->role === 'admin')
                    <!-- Admin fields -->
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status_klaim" class="form-control">
                            <option value="menunggu" {{ $klaim->status_klaim == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ $klaim->status_klaim == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="diterima" {{ $klaim->status_klaim == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ $klaim->status_klaim == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Catatan Admin</label>
                        <textarea name="catatan_admin" class="form-control">{{ $klaim->catatan_admin }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nama Pemilik</label>
                                <input type="text" name="nama_pemilik" class="form-control" value="{{ $klaim->nama_pemilik ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" value="{{ $klaim->no_telepon ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi Klaim</label>
                        <textarea name="deskripsi_klaim" class="form-control">{{ $klaim->deskripsi_klaim ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Bukti Kepemilikan</label>
                        <textarea name="bukti_kepemilikan" class="form-control">{{ $klaim->bukti_kepemilikan ?? '' }}</textarea>
                    </div>

                @else
                    <!-- Finder fields -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nama Pemilik *</label>
                                <input type="text" name="nama_pemilik" class="form-control" value="{{ $klaim->nama_pemilik ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>No Telepon *</label>
                                <input type="text" name="no_telepon" class="form-control" value="{{ $klaim->no_telepon ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi Klaim *</label>
                        <textarea name="deskripsi_klaim" class="form-control" required>{{ $klaim->deskripsi_klaim ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Bukti Kepemilikan</label>
                        <textarea name="bukti_kepemilikan" class="form-control">{{ $klaim->bukti_kepemilikan ?? '' }}</textarea>
                    </div>

                    <div class="alert alert-info">
                        <strong>Info:</strong> Sebagai finder, Anda hanya dapat mengedit informasi klaim. Status klaim hanya dapat diubah oleh admin.
                    </div>
                @endif

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('pages.klaim.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection