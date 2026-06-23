@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📋 Daftar Pengajuan Surat Mahasiswa</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Mahasiswa</th>
                    <th>Penerima</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($surat as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-mono">{{ $item->nomor_surat }}</td>
                        <td class="px-4 py-2">{{ $item->kategori->jenis_surat ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @foreach ($item->mahasiswa as $mhs)
                                <div>{{ $mhs->nama_mahasiswa }} ({{ $mhs->nim }})</div>
                            @endforeach
                        </td>
                        <td class="px-4 py-2">
                            {{ $item->penerima->nama_penerima ?? '-' }}<br>
                            <span class="text-sm text-gray-500">{{ $item->penerima->instansi ?? '' }}</span>
                        </td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td class="px-4 py-2">{{ $item->perihal }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">Belum ada pengajuan surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
