@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Dosen</h6>
            <a href="{{ route('dosen.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No.</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosen as $dsn)
                            <tr class="align-middle text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dsn->nidn }}</td>
                                <td>{{ $dsn->nama }}</td>
                                <td>{{ $dsn->email }}</td>
                                <td>{{ $dsn->jurusan }}</td>
                                <td>{{ $dsn->jabatan ?? '-' }}</td>
                                <td>
                                    @if ($dsn->foto)
                                        <img src="{{ asset('storage/' . $dsn->foto) }}" width="70" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dosen.show', $dsn->id) }}" class="btn btn-sm btn-info mb-1">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data dosen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
