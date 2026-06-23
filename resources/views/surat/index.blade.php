@extends('layouts.admin')

@section('title', 'Manajemen Data Surat FKOM')

@section('content')
    <div class="card shadow">
        <!-- Header -->
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">📋 Manajemen Data Surat FKOM</h6>
            <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Surat
            </a>
        </div>

        <!-- Body -->
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Mahasiswa</th>
                            <th>Penerima</th>
                            <th>Tanggal</th>

                            <th>status</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surat as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td><span class="font-monospace">{{ $item->nomor_surat }}</span></td>
                                <td>{{ $item->kategori->jenis_surat ?? '-' }}</td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        <div>{{ $mhs->nama_mahasiswa }} <br><small class="text-muted">{{ $mhs->nim }}</small></div>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $item->penerima->nama_penerima ?? '-' }}<br>
                                    <small class="text-muted">{{ $item->penerima->instansi ?? '' }}</small>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        
                                <td class="text-center">
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning text-white">Pending</span>
                                    @elseif($item->status == 'disetujui')
                                        <span class="badge bg-success text-white">Disetujui</span>
                                    @elseif($item->status == 'ditolak')
                                        <span class="badge bg-danger text-white">Ditolak</span>
                                    @endif

                                    <br>

                                    @if($item->pengirim_id)
                                        <span class="badge bg-primary text-white">Terverifikasi</span>
                                    @else
                                        <span class="badge bg-secondary text-white">Belum Diverifikasi</span>
                                    @endif

                                    </td>
                                <td class="text-center">
                                    <a href="{{ route('surat.show', $item) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">Belum ada pengajuan surat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
