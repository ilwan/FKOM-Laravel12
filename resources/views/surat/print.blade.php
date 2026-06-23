<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat</title>
<style>
    body {
        font-family: "Times New Roman", serif;
        margin: 2.5cm;
        font-size: 12pt;
        line-height: 1.5;
    }
    .text-right { text-align: right; }
    .indent { text-indent: 1cm; }
    .bold { font-weight: bold; }
    .signature-space { margin-top: 70px; }
</style>
</head>
<body>

{{-- ====================== TANGGAL ====================== --}}
<div class="text-right">
    {{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d F Y') }}
</div>

<br><br>

{{-- ====================== INFORMASI SURAT ====================== --}}
<table style="width: 100%;">
    <tr>
        <td style="width: 100px;">Nomor</td>
        <td>: {{ $surat->nomor_surat }}</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td>: -</td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>: {{ $surat->perihal }}</td>
    </tr>
</table>

<br><br>

{{-- ====================== PENERIMA SURAT ====================== --}}
Kepada Yth.<br>
{{ $surat->penerima->nama ?? '-' }}<br>
{{ $surat->penerima->jabatan ?? '' }}<br>
{{ $surat->penerima->instansi ?? '' }}<br>

<br>

Dengan hormat,<br>
Salam dunia satu keluarga,<br><br>

{{-- ====================== ISI SURAT ====================== --}}
<p class="indent">
    Kami dari {{ $surat->kategori->nama_kategori ?? 'Program Studi ...' }}, 
    dengan ini mengajukan permohonan izin kepada Bapak/Ibu untuk 
    melakukan pengambilan data penelitian sesuai dengan ketentuan yang berlaku.
</p>

<br>

{{-- JUDUL PENELITIAN --}}
<p class="bold" style="text-align: center;">
    “{{ $surat->judul_penelitian ?? 'Judul penelitian mahasiswa...' }}”
</p>

<br>

Adapun mahasiswa yang dimaksud adalah:
<br><br>

{{-- ====================== DATA MAHASISWA ====================== --}}
<table style="margin-left: 1cm;">
    <tr>
        <td style="width: 150px;">Nama</td>
        <td>: {{ $surat->pengirim->nama ?? '-' }}</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>: {{ $surat->pengirim->nim ?? '-' }}</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>: {{ $surat->pengirim->prodi ?? '-' }}</td>
    </tr>
</table>

<br>

<p class="indent">
    Kami berharap permohonan ini dapat dikabulkan agar kegiatan penelitian 
    dapat berjalan dengan lancar sesuai aturan yang berlaku.
</p>

<br>

Demikian permohonan ini kami sampaikan. Atas perhatian dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.

<br><br><br>

Hormat kami,<br><br><br><br>

{{ $surat->ttd_jabatan ?? 'Dekan Fakultas Komputer' }}

<div class="signature-space"></div>

<b>{{ $surat->ttd_nama ?? 'Suryo Widiantoro, S.T., M.MSI., M.Com. (IS)' }}</b>

</body>
</html>
