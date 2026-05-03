@extends('layouts.app')

@section('title', 'Jadwal Saya')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-calendar-alt"></i> Jadwal Serah Terima Saya
            </h4>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        @if($jadwals->isEmpty())
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-calendar-times fa-3x mb-3 text-muted"></i>
                <h5>Belum ada jadwal serah terima</h5>
                <p class="text-muted">Jadwal serah terima akan muncul di sini setelah penemu mengatur jadwal.</p>
            </div>
        @else
            <div class="row">
                @foreach($jadwals as $jadwal)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jadwal->klaim->laporan->nama_barang ?? 'Barang Hilang' }}</h5>
                                
                                <p class="small text-muted mb-2">
                                    <strong>Penemu:</strong> {{ $jadwal->penemu->name }}
                                </p>

                                <p class="mb-1">
                                    <i class="fas fa-calendar"></i> 
                                    {{ $jadwal->tanggal_serah_terima->format('d M Y • H:i') }}
                                </p>
                                <p class="mb-3">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    {{ $jadwal->lokasi_serah_terima }}
                                </p>

                                @if($jadwal->catatan)
                                    <p class="small text-muted"><strong>Catatan:</strong> {{ Str::limit($jadwal->catatan, 85) }}</p>
                                @endif

                                <span class="badge bg-{{ $jadwal->status === 'dijadwalkan' ? 'warning' : ($jadwal->status === 'selesai' ? 'success' : 'danger') }}">
                                    {{ ucfirst($jadwal->status) }}
                                </span>
                            </div>
                            <div class="card-footer bg-white">
                                <div class="btn-group w-100" role="group">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                    @if($jadwal->status === 'dijadwalkan')
                                        <button class="btn btn-sm btn-success" onclick="confirmAttendance({{ $jadwal->id }})">
                                            <i class="fas fa-check"></i> Konfirmasi Hadir
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        function confirmAttendance(jadwalId) {
            if (confirm('Apakah Anda yakin akan hadir pada jadwal ini?')) {
                // Implement AJAX call to confirm attendance
                fetch(`/serah-terima/${jadwalId}/confirm`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ action: 'confirm_attendance' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Gagal mengkonfirmasi kehadiran.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
            }
        }
    </script>
@endsection
