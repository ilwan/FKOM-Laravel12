<?php

namespace Database\Seeders;

use App\Models\KategoriSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['jenis_surat' => 'Surat Keputusan', 'kode' => '01', 'start_number' => 1, 'latest_number' => null, 'latest_year' => null],
            ['jenis_surat' => 'Surat Undangan', 'kode' => '02', 'start_number' => 1, 'latest_number' => null, 'latest_year' => null],
            ['jenis_surat' => 'Surat Permohonan', 'kode' => '03', 'start_number' => 1, 'latest_number' => null, 'latest_year' => null],
            ['jenis_surat' => 'Surat Pemberitahuan', 'kode' => '04', 'start_number' => 1, 'latest_number' => null, 'latest_year' => null],
            ['jenis_surat' => 'Surat Peminjaman', 'kode' => '05', 'start_number' => 1, 'latest_number' => null, 'latest_year' => null],
        ];

        foreach ($items as $it) {
            KategoriSurat::updateOrCreate(['kode' => $it['kode']], $it);
        }
    }
}
