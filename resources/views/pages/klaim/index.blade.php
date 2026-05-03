@extends('layouts.app')

@section('title', 'Data Klaim')

@section('content')
<div class="container">

    <h4 class="mb-3">Data Klaim</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Pelapor</th>
                        <th>Deskripsi Klaim</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($klaims as $klaim)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $klaim->laporan->nama_barang ?? '-' }}</td>
                            <td>{{ $klaim->user->name ?? '-' }}</td>
                            <td>
                                @if($klaim->deskripsi_klaim)
                                    <span class="text-truncate d-block" style="max-width: 200px;" title="{{ $klaim->deskripsi_klaim }}">
                                        {{ Str::limit($klaim->deskripsi_klaim, 50) }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{!! $klaim->status_label !!}</td>

                            <td>
                                <a href="{{ route('pages.klaim.show', $klaim) }}" class="btn btn-info btn-sm">Detail</a>

                                @if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id())
                                    <a href="{{ route('pages.klaim.edit', $klaim) }}" class="btn btn-warning btn-sm">Edit</a>
                                @endif

                                @if(auth()->user()->role === 'admin')
                                    <form action="{{ route('pages.klaim.destroy', $klaim) }}" method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            {{ $klaims->links() }}

        </div>
    </div>
</div>
@endsection