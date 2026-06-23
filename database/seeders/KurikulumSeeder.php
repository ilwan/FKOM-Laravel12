<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumSeeder extends Seeder
{
    public function run(): void
    {
        $prodiId = DB::table('tbl_prodi')->insertGetId([
            'nama' => 'Teknik Perangkat Lunak',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $curriculum = [
            1 => ['Dasar Pemrograman', 'Matematika Diskrit', 'Pengembangan Web Dasar', 'Arsitektur Komputer'],
            2 => ['Struktur Data & Algoritma', 'Basis Data', 'Pemrograman Berorientasi Objek', 'Sistem Operasi'],
            3 => ['Rekayasa Perangkat Lunak', 'Desain Antarmuka Pengguna', 'Pemrograman Web Lanjut', 'Jaringan Komputer'],
            4 => ['Pemrograman Mobile', 'Testing & Quality Assurance', 'Manajemen Proyek Perangkat Lunak', 'Kecerdasan Buatan'],
            5 => ['Cloud Computing', 'DevOps Practices', 'Keamanan Perangkat Lunak', 'Metode Agile'],
            6 => ['Arsitektur Perangkat Lunak', 'UI/UX Design', 'Big Data', 'Kewirausahaan Teknologi'],
            7 => ['Machine Learning Engineering', 'Microservices Architecture', 'Proyek Perangkat Lunak', 'Magang Industri'],
            8 => ['Tugas Akhir', 'Etika Profesi', 'Seminar Teknologi'],
        ];

        foreach ($curriculum as $semester => $courses) {
            foreach ($courses as $course) {
                DB::table('tbl_kurikulum')->insert([
                    'prodi_id' => $prodiId,
                    'semester' => $semester,
                    'course_name' => $course,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
