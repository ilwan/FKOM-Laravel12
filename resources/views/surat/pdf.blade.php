<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat {{ $surat->nomor_surat }}</title>
    <style>
        @page {
            size: A4;              /* pastikan ukuran kertas A4 */
            margin: 10mm 20mm 10mm 20mm; /* atas, kanan, bawah, kiri */
        }

        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            font-size: 11pt;
            line-height: 1.25;
            margin: 0; /* Dompdf pakai margin dari @page */
        }

        /* === HEADER (KOP SURAT) === */
        .header {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .header img {
            height: 50px;
        }

        /* === ISI SURAT === */
        .tanggal {
            text-align: right;
            margin-bottom: 10px;
        }

        table.meta {
            width: 100%;
            margin-bottom: 20px;
        }

        table.meta td:first-child {
            width: 20%;
            vertical-align: top;
        }


        .content {
            text-align: justify;
        }

        .indent {
            text-indent: 40px;
        }

        /* === PENUTUP DAN TANDA TANGAN === */
         .signature {
            width: 35%;
            float: right;
            text-align: center;
            margin-top: 30px;
        }

        .signature .jabatan {
            margin-bottom: 0px;
        }

        /* === FOOTER (GAMBAR) === */
        .footer {
            position: fixed;
            bottom: -10px; /* agar menempel ke tepi bawah */
            left: 0;
            right: 0;
            margin: 0;
            padding: 0;
            z-index: -1;
        }

        .footer img {
            width: 100%;
            height: auto;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    {{-- === KOP SURAT === --}}
    <div class="header">
        <div>
            <img src="{{ public_path('images/logo.png') }}" alt="Logo">
        </div>
    </div>

    {{-- === TANGGAL DAN META === --}}
    <p class="tanggal">
        Batam, {{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d F Y') }}
    </p>

    <table class="meta">
        <tr>
            <td>Nomor</td>
            <td>: {{ $surat->nomor_surat }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>: {{ $surat->file_url ? '1 (satu) berkas' : '-' }}</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>: {{ $surat->perihal }}</td>
        </tr>
    </table>

    {{-- === TUJUAN SURAT === --}}
    <p>Kepada Yth.</p>
    <p>
        Bapak {{ $surat->penerima->nama_penerima ?? '-' }}<br>
        {{ $surat->penerima->jabatan_penerima ?? '' }}
        {{ $surat->penerima->instansi ?? '' }}<br>
        di Tempat
    </p>

<p style="margin: 0;">Dengan hormat,</p>
<p style="margin: 0;">Salam Dunia Satu Keluarga,</p>

    {{-- === ISI SURAT === --}}
    <div class="content">
        <p class="indent">
            Kami dari Program Studi {{ $surat->mahasiswa->first()->program_studi ?? '-' }}, Fakultas Komputer Universitas Universal,
            dengan ini mengajukan permohonan kepada Bapak/Ibu untuk keperluan kegiatan akademik mahasiswa kami dalam rangka penyusunan tugas akhir/penelitian dengan judul:
        </p>

        @foreach($surat->mahasiswa as $mhs)
        <p style="margin-left: 50px;">
            “{{ $mhs->judul_penelitian }}”<br><br>
        </p>Adapun mahasiswa yang dimaksud adalah:</p>
            {{-- Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mhs->nama_mahasiswa }}<br>
            NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mhs->nim }}<br>
            Program Studi&nbsp;: {{ $mhs->program_studi }} --}}
    <table style="margin-top: -20px">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $mhs->nama_mahasiswa }}</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td>{{ $mhs->nim }}</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>{{ $mhs->program_studi }}</td>
    </tr>
</table>

        </p>
        @endforeach

        <p class="indent">
Kami berharap Bapak/Ibu berkenan memberikan izin serta dukungan agar kegiatan yang dimaksud dapat terlaksana dengan baik dan sesuai ketentuan yang berlaku.
        </p>

        <p class="indent">
            Demikian surat permohonan ini kami sampaikan. Atas perhatian dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.
        </p>
    </div>

    {{-- === PENUTUP DAN TANDA TANGAN === --}}
   <div class="signature">
        {{-- === PENUTUP DAN TANDA TANGAN === --}}
<table>
    <tr>
        <td>
            <p>Hormat kami,</p>
            <p><strong>Dekan Fakultas Komputer</strong></p>

            @if($surat->pengirim)
                @if(file_exists(public_path('images/ttd.png')))
                    <img src="file://{{ public_path('images/ttd.png') }}" 
                         alt="Tanda Tangan" 
                         width="180" 
                         style="margin-bottom:-35px; margin-top:5px;">
                @endif
                <p style="margin-top:10px; font-weight:bold;">
                    {{ $surat->pengirim->penandatangan }}
                </p>
            @else
                <br><br><br>
                <p><strong>__________________________</strong></p>
            @endif
        </td>
    </tr>
</table>

    </div>
    {{-- === FOOTER GAMBAR === --}}
    <div class="footer">
        <img src="{{ public_path('images/footersurat.png') }}" alt="Footer Universitas">
    </div>

</body>
</html>