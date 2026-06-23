@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah Data Dosen</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group mb-3">
                    <label for="nidn">NIDN</label>
                    <input type="text" name="nidn" id="nidn" value="{{ $dosen->nidn }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $dosen->nama }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $dosen->email }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $dosen->jurusan }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ $dosen->jabatan }}" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label for="foto">Foto</label><br>
                    @if ($dosen->foto)
                        <img src="{{ asset('storage/'.$dosen->foto) }}" width="80"><br>
                    @endif
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
