<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'nama' => 'Budi Santoso',
                'nim' => '210001',
                'program_studi' => 'Teknik Informatika',
                'angkatan' => '2021',
                'email' => 'budi@example.com',
                'no_hp' => '081234567890',
                'foto_path' => 'images/default.png', // file di public/images/default.png
            ],
            [
                'nama' => 'Siti Aminah',
                'nim' => '210002',
                'program_studi' => 'Sistem Informasi',
                'angkatan' => '2021',
                'email' => 'siti@example.com',
                'no_hp' => '081298765432',
                'foto_path' => 'images/default.png',
            ],
        ];

        foreach ($students as $s) {
            $foto_path = null;

            // cek file ada di public
            if (!empty($s['foto_path']) && file_exists(public_path($s['foto_path']))) {
                // salin ke storage/public/mahasiswa/ jika ingin
                $filename = 'mahasiswa/' . $s['nim'] . '.png';
                Storage::disk('public')->put($filename, file_get_contents(public_path($s['foto_path'])));
                $foto_path = $filename;
            }

            Mahasiswa::create([
                'nama' => $s['nama'],
                'nim' => $s['nim'],
                'program_studi' => $s['program_studi'],
                'angkatan' => $s['angkatan'],
                'email' => $s['email'],
                'no_hp' => $s['no_hp'],
                'foto' => $foto_path,
            ]);
        }
    }
}
