@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">
<h2>Verifikasi Surat</h2>


<p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
<p><strong>Jenis Surat:</strong> {{ $surat->kategori->jenis_surat }}</p>
<p><strong>Perihal:</strong> {{ $surat->perihal }}</p>


<div style="margin-top:20px;">
<button onclick="alert('Disetujui!')">Setujui</button>
<button onclick="alert('Ditolak!')">Tolak</button>
</div>


<a href="{{ route('surat.index') }}">Kembali</a>
</div>
@endsection