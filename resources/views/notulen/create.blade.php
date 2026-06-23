@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Notulen Rapat</h2>

        <form action="{{ route('notulen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Waktu Mulai</label>
                <input type="time" name="waktu_mulai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Waktu Selesai</label>
                <input type="time" name="waktu_selesai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tempat</label>
                <input type="text" name="tempat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Pemimpin Rapat</label>
                <input type="text" name="pemimpin_rapat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Notulis</label>
                <input type="text" name="notulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Agenda</label>
                <textarea name="agenda" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Hasil Rapat</label>
                <textarea name="hasil_rapat" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Tindak Lanjut</label>
                <textarea name="tindak_lanjut" class="form-control"></textarea>
            </div>
<div class="mb-3">
    <label for="peserta">Peserta Rapat</label>
    <div class="checkbox-grid">
        @foreach ($dosen as $ds)
            <div class="form-check">
                <input 
                    type="checkbox" 
                    name="peserta[]" 
                    value="{{ $ds->nama }}" 
                    id="peserta_{{ $ds->id }}" 
                    class="form-check-input">
                <label for="peserta_{{ $ds->id }}" class="form-check-label">
                    {{ $ds->nama }}
                </label>
            </div>
        @endforeach
    </div>
    <small class="text-muted">Pilih lebih dari satu peserta dengan centang</small>
</div>

<style>
    /* Grid otomatis, isi kolom ke samping */
    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); 
        gap: 5px 20px; /* jarak antar item */
        max-height: 400px; /* kalau mau dibatasi tinggi */
        overflow-y: auto;  /* scroll kalau kepanjangan */
    }
</style>


            <div class="mb-3">
                <label>Upload Foto</label>
                <input type="file" name="foto[]" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
        <script>
$(document).ready(function() {
    $('#peserta').select2({
        placeholder: "Cari nama dosen...",
        allowClear: true
    });
});
</script>
    </div>
    

@endsection
