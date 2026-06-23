@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Gambar Slideshow</h6>
            <a href="{{ route('slide.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Gambar
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
                            <th>Deskirpsi</th>
                            <th>Image</th>
                            <th>Urutan Tampil</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($slide as $sld)
                            <tr class="align-middle text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $sld->title }}</td>
                                <td>{{ $sld->description }}</td>
                                <td>
                                    @if ($sld->image_path)
                                        <img src="{{ asset('storage/' . $sld->image_path) }}" width="70" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $sld->display_order }}</td>
                                <td>
                                    @if ($sld->is_active === 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                
                                <td>{{ $sld->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('slide.show', $sld->id) }}" class="btn btn-sm btn-info mb-1">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('slide.edit', $sld->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <form action="{{ route('slide.destroy', $sld->id) }}" method="POST" class="d-inline"
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
