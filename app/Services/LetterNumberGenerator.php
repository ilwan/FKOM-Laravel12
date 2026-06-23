<?php

namespace App\Services;

use App\Models\KategoriSurat;
use App\Models\Surat;
use Illuminate\Support\Facades\DB;

class LetterNumberGenerator
{
    protected string $unitCode;

    public function __construct()
    {
        $this->unitCode = config('surat.unit_code', 'FK-UVERS');
    }

    public function createLetter(array $data): Surat
    {
        return DB::transaction(function () use ($data) {
            $kategori = KategoriSurat::findOrFail($data['kategori_surat_id']);

            $year = date('Y', strtotime($data['tanggal']));

            // Reset nomor jika tahun berubah
            if ($kategori->latest_year !== (int)$year) {
                $next = $kategori->start_number;
                $kategori->latest_year = (int)$year;
            } else {
                $next = $kategori->latest_number ? $kategori->latest_number + 1 : $kategori->start_number;
            }

            $kategori->latest_number = $next;
            $kategori->save();

            $leading = str_pad($kategori->kode ?? $kategori->id, 2, '0', STR_PAD_LEFT);
            $urut = str_pad($next, 3, '0', STR_PAD_LEFT);
           // $month = (int) date('n', strtotime($data['tanggal']));
            $monthNumber = (int) date('n', strtotime($data['tanggal']));
            $romanMonths = [
                1  => 'I',
                2  => 'II',
                3  => 'III',
                4  => 'IV',
                5  => 'V',
                6  => 'VI',
                7  => 'VII',
                8  => 'VIII',
                9  => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII',
            ];
            $month = $romanMonths[$monthNumber];
            // Format nomor surat dengan reset tahunan
            // $nomorSurat = sprintf('%s.%s/%s/%s/%d', $leading, $urut, $this->unitCode, $month, $year);
            // Cek kategori Undangan
        $isUndangan = $kategori->kode === '02';
        // Tentukan kode tipe surat
        $tipeKode = '';
        if ($isUndangan) {
        if (!empty($data['tipe'])) {
            if ($data['tipe'] === 'internal') {
                $tipeKode = 'I';
            } elseif ($data['tipe'] === 'external') {
                $tipeKode = 'E';
            }
            }
        }

// Format nomor surat
if ($tipeKode) {
    $nomorSurat = sprintf('%s.%s/%s/%s/%s/%d', $leading, $urut, $tipeKode, $this->unitCode, $month, $year);
} else {
    $nomorSurat = sprintf('%s.%s/%s/%s/%d', $leading, $urut, $this->unitCode, $month, $year);
}

    $surat = Surat::create([
    'kategori_surat_id' => $kategori->id,
    'pengirim_id' => $data['pengirim_id'] ?? null,
    'penerima_id' => $data['penerima_id'] ?? null,
    'leading_number' => (int)$kategori->kode,
    'nomor_urut' => $next,
    'tanggal' => $data['tanggal'],
    'nomor_surat' => $nomorSurat,
    'perihal' => $data['perihal'] ?? '-',
    'file_url' => $data['file_url'] ?? null,
]);
if (!empty($data['mahasiswa'])) {
    foreach ($data['mahasiswa'] as $mhs) {
        $surat->mahasiswa()->create([
            'nama_mahasiswa' => $mhs['nama_mahasiswa'],
            'nim' => $mhs['nim'] ?? null,
            'program_studi' => $mhs['program_studi'] ?? null,
            'judul_penelitian' => $mhs['judul_penelitian'] ?? null,
        ]);
    }
}
            return $surat;
        });
    }
}