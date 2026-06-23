<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        $faker = Faker::create('id_ID');

        $judul = $faker->sentence(6);
        $slug  = str()->slug($judul);

        return [
            'judul'     => $judul,
            'slug'      => $slug,
            'isi'       => $faker->paragraphs(8, true),
            'kategori'  => $faker->randomElement(['Semua Berita', 'Akademik', 'Penelitian', 'Pengumuman', 'Kegiatan', 'Beasiswa', 'Umum']),
            'penulis'   => $faker->name(),
            'foto'      => $faker->randomElement([
                'berita1.jpg',
                'berita2.jpg',
                'berita3.jpg',
                null
            ]),
            'status'    => $faker->randomElement(['draft', 'publish']),
        ];
    }
}
