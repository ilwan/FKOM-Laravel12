@extends('layouts.admin')

@section('title', 'Detail Surat')

@section('content')
<div class="container">
    <div class="">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                📄 Detail Surat: {{ $surat->nomor_surat }}
            </h6>
            <a href="{{ route('surat.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <table class="table table-borderless table-striped">
                <tr>
                    <th width="25%">Nomor Surat</th>
                    <td>{{ $surat->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $surat->kategori->jenis_surat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <td>{{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $surat->perihal }}</td>
                </tr>
                <tr>
                    <th>Penerima</th>
                    <td>
                        {{ $surat->penerima->nama_penerima ?? '-' }} <br>
                        <small class="text-muted">
                            {{ $surat->penerima->jabatan_penerima ?? '' }},
                            {{ $surat->penerima->instansi ?? '' }}
                        </small>
                    </td>
                </tr>
            </table>

            <hr>

            <h6 class="font-weight-bold text-primary">👨‍🎓 Data Mahasiswa</h6>
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Judul Penelitian / Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat->mahasiswa as $mhs)
                        <tr>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->program_studi }}</td>
                            <td>{{ $mhs->judul_penelitian }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($surat->file_url)
                <div class="mt-4">
                    <h6 class="font-weight-bold text-primary">📎 Lampiran Surat</h6>
                    <a href="{{ asset('storage/' . $surat->file_url) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-download"></i> Unduh Lampiran
                    </a>
                </div>
            @endif

            <hr>

            {{-- Verifikasi Surat --}}
            @if(!$surat->pengirim_id)
                <form action="{{ route('surat.verifikasi', $surat->id) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-check"></i> Verifikasi Surat
                    </button>
                </form>
            @else
                <span class="badge bg-success text-white">✔ Telah Diverifikasi</span>
            @endif

            <hr>

            {{-- Update Status Surat --}}
            @if($surat->status == 'pending')
                <form action="{{ route('surat.setuju', $surat->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm" 
                            onclick="return confirm('Setujui surat ini?')">
                        <i class="fas fa-check"></i> Setuju
                    </button>
                </form>

                <form action="{{ route('surat.tolak', $surat->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Tolak surat ini?')">
                        <i class="fas fa-times"></i> Tolak
                    </button>
                </form>
            @else
                <span class="badge bg-primary text-white">{{ ucfirst($surat->status) }}</span>
            @endif
<a href="{{ route('surat.cetak', $surat->id) }}" target="_blank" class="btn btn-primary btn-sm mt-3">
    <i class="fas fa-print"></i> Cetak PDF
</a>

        </div>
    </div>
</div>
@endsection

