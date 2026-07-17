<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            [
                'publisher_name' => 'Gramedia Pustaka',
            ],
            [
                'publisher_name' => 'Pustaka Harta',
            ],
            [
                'publisher_name' => 'Persada',
            ],
        ];

        foreach ($publishers as $data) {
            Publisher::create($data);
        }
    }
}
