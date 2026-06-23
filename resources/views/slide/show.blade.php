@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Detail Berita</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Judul Berita</div>
                <div class="col-sm-9">{{ $berita->judul }}</div>
            </div>
            <div class="mb-2">
                <span class="badge bg-info">{{ $berita->kategori }}</span>
                <span class="ms-2 text-muted">Ditulis oleh {{ $berita->penulis }}</span>
                <span class="ms-2 text-muted">{{ $berita->created_at->format('d M Y H:i') }}</span>
            </div>
             <div class="mb-3">
                @if ($berita->status === 'publish')
                    <span class="badge bg-success">Publish</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </div>
            
            @if ($berita->foto)
                <div class="mb-3 text-center">
                    <img src="{{ asset('storage/' . $berita->foto) }}" 
                         class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>
            @endif
            <div class="mb-4" style="white-space: pre-line;">
                {!! nl2br(e($berita->isi)) !!}
            </div>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning">
    <i class="fas fa-edit"></i> Ubah Berita
</a>
        </div>
    </div>
</div>
@endsection

