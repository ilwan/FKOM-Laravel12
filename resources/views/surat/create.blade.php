@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Buat Surat Baru</h2>

    <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- Kategori --}}
        <div class="form-group">
            <label for="kategori_surat_id">Kategori</label>
            <select name="kategori_surat_id" id="kategori_surat_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" data-kode="{{ $k->kode }}">{{ $k->jenis_surat }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tipe Surat (hanya untuk Undangan) --}}
        <div class="form-group" id="tipe-container" style="display: none;">
            <label for="tipe">Tipe Surat</label>
            <select name="tipe" id="tipe" class="form-control">
                <option value="">-- Pilih Tipe --</option>
                <option value="internal">Internal</option>
                <option value="external">Eksternal</option>
            </select>
        </div>

        {{-- Tanggal --}}
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        {{-- Perihal --}}
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" id="perihal" class="form-control" required>
        </div>

        {{-- File --}}
        <div class="form-group">
            <label for="file">File PDF</label>
            <input type="file" name="file" id="file" class="form-control-file" accept="application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- JavaScript --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kategoriSelect = document.getElementById('kategori_surat_id');
        const tipeContainer = document.getElementById('tipe-container');

        function checkKategori() {
            const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
            const kode = selectedOption.getAttribute('data-kode');

            if (kode === '02') {
                tipeContainer.style.display = 'block';
            } else {
                tipeContainer.style.display = 'none';
                document.getElementById('tipe').value = '';
            }
        }

        kategoriSelect.addEventListener('change', checkKategori);
        checkKategori(); // jalankan saat halaman load
    });
</script>
@endsection
