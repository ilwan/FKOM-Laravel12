@extends('layouts.app')

@section('content')
   <H1>Manajemen Data MAhasiswa</H1>
   <table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>NIM </th>
            <th>Nama </th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswa as $mhs)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mhs->nim}}</td>
            <td>{{ $mhs->nama}}</td>
            <td>{{ $mhs->email}}</td>
            <td>{{ $mhs->jurusan}}</td>
            <td>{{ $mhs->angkatan}}</td>
            <td>Ubah | Hapus</td>
        </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum Ada Data Mahasiswa</td>
            </tr>
        @endforelse
        
    </tbody>
   </table>
@endsection