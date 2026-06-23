<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'student' => $this->faker->name(),
            'nim' => $this->faker->numerify('19########'),
            'prodi' => $this->faker->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
                'Teknologi Informasi',
                'Rekayasa Perangkat Lunak'
            ]),
            'category' => $this->faker->randomElement([
                'Mobile App',
                'Web App',
                'Desktop App',
                'IoT Project',
                'Machine Learning'
            ]),
            'description' => $this->faker->paragraph(5),

            'image' => '/image/sample-' . $this->faker->numberBetween(1, 5) . '.png',

            'gallery' => json_encode([
                '/image/sample-1.png',
                '/image/sample-2.png',
                '/image/sample-3.png'
            ]),

            'tags' => json_encode($this->faker->randomElements([
                'Laravel', 'Flutter', 'React', 'Vue', 'API', 'MySQL', 'Firebase'
            ], rand(2, 4))),

            'link' => $this->faker->url(),
            'demo' => $this->faker->url(),
            'year' => $this->faker->year(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
