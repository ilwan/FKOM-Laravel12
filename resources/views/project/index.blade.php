@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Project</h3>
        <a href="{{ route('project.create') }}" class="btn btn-primary">+ Tambah Project</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Mahasiswa</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->student }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->year }}</td>
                <td>
                    <a href="{{ route('project.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('project.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}

</div>
@endsection
