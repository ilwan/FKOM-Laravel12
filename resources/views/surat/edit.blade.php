@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2>Edit Notulen Rapat</h2>

    <form action="{{ route('notulen.update', $notulen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $notulen->judul) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($notulen->tanggal)->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai', $notulen->waktu_mulai) }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai', $notulen->waktu_selesai) }}" required>
        </div>

        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ old('tempat', $notulen->tempat) }}" required>
        </div>

        <div class="mb-3">
            <label>Pemimpin Rapat</label>
            <input type="text" name="pemimpin_rapat" class="form-control" value="{{ old('pemimpin_rapat', $notulen->pemimpin_rapat) }}" required>
        </div>

        <div class="mb-3">
            <label>Notulis</label>
            <input type="text" name="notulis" class="form-control" value="{{ old('notulis', $notulen->notulis) }}" required>
        </div>

        <div class="mb-3">
            <label>Agenda</label>
            <textarea name="agenda" class="form-control">{{ old('agenda', $notulen->agenda) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Hasil Rapat</label>
            <textarea name="hasil_rapat" class="form-control">{{ old('hasil_rapat', $notulen->hasil_rapat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tindak Lanjut</label>
            <textarea name="tindak_lanjut" class="form-control">{{ old('tindak_lanjut', $notulen->tindak_lanjut) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Peserta</label>
            @php $peserta = old('peserta', $notulen->peserta ?? []) @endphp
            @for ($i = 0; $i < max(3, count($peserta)); $i++)
                <input type="text" name="peserta[]" class="form-control mb-2" value="{{ $peserta[$i] ?? '' }}" placeholder="Peserta {{ $i + 1 }}">
            @endfor
            <small class="text-muted">Tambah lebih banyak peserta dengan menambah input manual.</small>
        </div>

        <div class="mb-3">
            <label>Foto Lama</label>
            <div class="flex flex-wrap gap-3">
                @foreach ($notulen->foto as $foto)
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$foto->foto_path) }}" width="120" class="mb-1 border rounded">
                        <div>
                            <label>
                                <input type="checkbox" name="hapus_foto[]" value="{{ $foto->id }}"> Hapus
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label>Upload Foto Baru</label>
            <input type="file" name="foto[]" class="form-control" multiple>
            <small class="text-muted">Bisa pilih lebih dari satu file.</small>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
