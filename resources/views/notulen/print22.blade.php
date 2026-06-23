<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notulen Rapat - {{ $notulen->judul }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2, h3 { margin-bottom: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 5px; }
        .foto { margin-top: 20px; }
        .foto img { width: 200px; margin: 5px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Notulen Rapat</h2>
    <h3 style="text-align:center;">{{ $notulen->judul }}</h3>
    <hr>

    <p><strong>Tanggal:</strong> {{ $notulen->tanggal }}</p>
    <p><strong>Waktu:</strong> {{ $notulen->waktu_mulai }} - {{ $notulen->waktu_selesai }}</p>
    <p><strong>Tempat:</strong> {{ $notulen->tempat }}</p>
    <p><strong>Pemimpin Rapat:</strong> {{ $notulen->pemimpin_rapat }}</p>
    <p><strong>Notulis:</strong> {{ $notulen->notulis }}</p>

    <h4>Agenda</h4>
    <p>{!! nl2br(e($notulen->agenda)) !!}</p>

    <h4>Hasil Rapat</h4>
    <p>{!! nl2br(e($notulen->hasil_rapat)) !!}</p>

    <h4>Tindak Lanjut</h4>
    <p>{!! nl2br(e($notulen->tindak_lanjut)) !!}</p>

    <h4>Peserta</h4>
    <ul>
        @foreach($notulen->peserta ?? [] as $peserta)
            <li>{{ $peserta }}</li>
        @endforeach
    </ul>

    @if($notulen->foto->count())
        <div class="foto">
            <h4>Dokumentasi</h4>
            @foreach($notulen->foto as $foto)
                <img src="{{ public_path('storage/'.$foto->foto_path) }}" alt="Foto Notulen">
            @endforeach
        </div>
    @endif

</body>
</html>
