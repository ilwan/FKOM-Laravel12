@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Berita</h6>
            <a href="{{ route('berita.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Berita
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
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $brt)
                            <tr class="align-middle text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $brt->judul }}</td>
                                <td>{{ $brt->kategori }}</td>
                                <td>{{ $brt->penulis }}</td>
                                <td>
                                    @if ($brt->status === 'publish')
                                        <span class="badge bg-success">Publish</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($brt->foto)
                                        <img src="{{ asset('storage/' . $brt->foto) }}" width="70" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $brt->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('berita.show', $brt->id) }}" class="btn btn-sm btn-info mb-1">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('berita.edit', $brt->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <form action="{{ route('berita.destroy', $brt->id) }}" method="POST" class="d-inline"
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
                                <td colspan="8" class="text-center text-muted">Belum ada data berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
