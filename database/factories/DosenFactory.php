<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gunakan $this->faker, bukan fake()
        return [
            'nidn' => $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name(),
            'prodi' => $this->faker->randomElement([
                'Sistem Informasi',
                'Teknik Informatika',
                'Teknik Perangkat Lunak',
            ]),
            'email' => $this->faker->unique()->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
            'jabatan' => $this->faker->randomElement(['Dosen', 'Lektor', 'Kaprodi', 'Dekan']),
            'pendidikan_terakhir' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'bidang_keahlian' => $this->faker->randomElement([
                'Informatika',
                'Sistem Informasi',
                'Teknologi Informasi',
                'Rekayasa Perangkat Lunak',
                'Jaringan Komputer',
                'Keamanan Siber',
                'Cloud Computing',
                'IoT',
                'Data Science',
                'Artificial Intelligence',
                'Machine Learning',
                'UX/UI Design',
                'Game Development',
                'DevOps',
                'Multimedia',
                'Digital Forensics'
            ]),

            'google_id' => $this->faker->url(),
            'sinta_link' => $this->faker->url(),
            'scopus_link' => $this->faker->url(),
            'foto_url' => 'dosen/' . $this->faker->uuid . '.jpg',
            'status' => $this->faker->randomElement(['Aktif', 'Tidak aktif']),
        ];
    }
}
