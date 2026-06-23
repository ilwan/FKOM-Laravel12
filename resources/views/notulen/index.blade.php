@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Gambar Notulen Rapat</h6>
                <a href="{{ route('notulen.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Notulen
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
                                <th>Tanggal</th>
                                <th>Pemimpin</th>
                                <th>Notulis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notulen as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->pemimpin_rapat }}</td>
                                    <td>{{ $item->notulis }}</td>
                                    <td>
                                        
                                            <a href="{{ route('notulen.print', $item->id) }}" class="btn btn-primary btn-sm"
                                                target="_blank">
                                                <i class="fas fa-file-pdf"></i> Print PDF
                                            </a>
                                    
                                        <a href="{{ route('notulen.show', $item->id) }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-eye"></i> Detail</a>
                                        <a href="{{ route('notulen.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('notulen.destroy', $item->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus notulen ini?')"><i
                                                    class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notulen->links() }}
                </div>
            @endsection
