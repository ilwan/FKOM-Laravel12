@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2>Detail Notulen Rapat</h2>

    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $notulen->judul }}</h4>
            <p><strong>Tanggal:</strong> {{ $notulen->tanggal }}</p>
            <p><strong>Waktu:</strong> {{ $notulen->waktu_mulai }} - {{ $notulen->waktu_selesai }}</p>
            <p><strong>Tempat:</strong> {{ $notulen->tempat }}</p>
            <p><strong>Pemimpin:</strong> {{ $notulen->pemimpin_rapat }}</p>
            <p><strong>Notulis:</strong> {{ $notulen->notulis }}</p>
            <p><strong>Agenda:</strong> {!! nl2br(e($notulen->agenda)) !!}</p>
            <p><strong>Hasil Rapat:</strong> {!! nl2br(e($notulen->hasil_rapat)) !!}</p>
            <p><strong>Tindak Lanjut:</strong> {!! nl2br(e($notulen->tindak_lanjut)) !!}</p>
            <p><strong>Peserta:</strong> 
                @if(is_array($notulen->peserta))
                    {{ implode(', ', $notulen->peserta) }}
                @endif
            </p>
        </div>
    </div>

    <h5>Foto Rapat</h5>
    <div class="row">
        @forelse($notulen->foto as $foto)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $foto->foto_path) }}" class="card-img-top" alt="Foto Rapat">
                </div>
            </div>
        @empty
            <p>Tidak ada foto rapat.</p>
        @endforelse
    </div>

    <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">
    <i class="fas fa-edit"></i> Ubah Notulen Rapat
</a>
</div>
@endsection
