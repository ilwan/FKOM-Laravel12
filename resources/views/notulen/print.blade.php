<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Notulen Rapat - {{ $notulen->judul }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        td,
        th {
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        .header {
            width: 100%;
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .header img {
            height: 45px;
        }

        .header-text {
            flex: 1;
            text-align: center;
            padding-top: 15px;
        }

        /* geser teks agak ke bawah */
        .section-title {
            background-color: #f2b9a3;
            font-weight: bold;
        }

        .ttd {
            text-align: center;
            padding-top: 50px;
        }

        .ttd img {
            height: 60px;
        }
    </style>

</head>

<body>

    <!-- Header -->
    <div class="header">
        <!-- Logo kiri -->
        <div>
            <img src="{{ public_path('images/logo.png') }}" alt="Logo">
        </div>

        <!-- Teks tengah -->
        <div class="header-text">
            <h3>NOTULEN RAPAT<br>FAKULTAS KOMPUTER</h3>
        </div>
    </div>
    <!-- Info rapat -->
    <table>
        <tr>
            <td style="width:30%"><strong>Agenda Rapat</strong></td>
            <td>{{ $notulen->agenda }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Rapat</strong></td>
            <td>{{ \Carbon\Carbon::parse($notulen->tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td><strong>Sekretaris Rapat</strong></td>
            <td>{{ $notulen->notulis }}</td>
        </tr>
    </table>

    <!-- Peserta -->
    <table>
        <tr>
            <td class="section-title">Peserta Hadir Rapat</td>
        </tr>
        <tr>
            <td>
                <ol>
                    @foreach ($notulen->peserta ?? [] as $peserta)
                        <li>{{ $peserta }}</li>
                    @endforeach
                </ol>
            </td>
        </tr>
    </table>

    <!-- Diskusi -->
    <table>
        <tr>
            <td class="section-title">Diskusi dan Issue yang diangkat</td>
        </tr>
        <tr>
            <td>{!! nl2br(e($notulen->hasil_rapat)) !!}</td>
        </tr>
    </table>

    <!-- Dokumentasi -->
    @if ($notulen->foto->count())
        <table>
            <tr>
                <td class="section-title">Dokumentasi Rapat</td>
            </tr>
            <tr>
                <td>
                    <table style="width:100%; border:none;">
                        <tr>
                            @foreach ($notulen->foto as $index => $foto)
                                <td style="text-align:center; border:none; width:50%;">
                                    <img src="{{ public_path('storage/' . $foto->foto_path) }}"
                                        style="max-width: 250px; max-height: 180px; object-fit: cover; border:1px solid #ccc; margin:5px;">
                                </td>
                                @if (($index + 1) % 2 == 0)
                        </tr>
                        <tr> {{-- setiap 2 foto ganti baris --}}
    @endif
    @endforeach
    </tr>
    </table>
    </td>
    </tr>
    </table>

    @endif

    <!-- Tindak lanjut -->
    <table>
        <tr>
            <td class="section-title">Tindak Lanjut</td>
            <td class="section-title" style="width:20%">PIC</td>
            <td class="section-title" style="width:20%">Due Date</td>
        </tr>
        <tr>
            <td>{!! nl2br(e($notulen->tindak_lanjut)) !!}</td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <!-- Tanda tangan -->
    <table style="margin-top:30px; border:none; width:100%;">
        <tr>
            <td class="ttd" style="border:none; width:50%;">
                Sekretaris Rapat <br><br>
                {{-- <img src="{{ public_path('images/ttd-sekretaris.png') }}" alt="TTD Sekretaris"><br> --}}

                {{-- QR Code di atas nama, posisi tengah --}}
                <div style="margin:10px 0; text-align:center;">
                    <div style="display: inline-block;">
                        {!! DNS2D::getBarcodeHTML($notulen->notulis, 'QRCODE', 4, 4) !!}
                    </div>
                </div>
                <strong>{{ $notulen->notulis }}</strong>
            </td>
            <td class="ttd" style="border:none; width:50%;">
                Ketua Rapat <br><br>
                {{-- <img src="{{ public_path('images/ttd-ketua.png') }}" alt="TTD Ketua"><br> --}}

                {{-- QR Code di atas nama, posisi tengah --}}
                <div style="margin:10px 0; text-align:center;">
                    <div style="display: inline-block;">
                        {!! DNS2D::getBarcodeHTML($notulen->pemimpin_rapat, 'QRCODE', 4, 4) !!}
                    </div>
                </div>

                <strong>{{ $notulen->pemimpin_rapat }}</strong>
            </td>
        </tr>
    </table>
</body>

</html>
