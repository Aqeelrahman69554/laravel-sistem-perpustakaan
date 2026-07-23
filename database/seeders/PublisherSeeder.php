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
        // standar penulisan laravel modern
        $publishers = [
            [
                'publisher_name' => 'Bentang Pustaka',
                'publisher_email' => 'gramediapustaka@gmail.com',
                'publisher_telp' => '08382721345',
                'publisher_address' => 'jl. Mawar, Jakarta Barat',
            ],
            [
                'publisher_name' => 'Prentice Hall',
                'publisher_email' => 'kantapustaka@gmail.com',
                'publisher_telp' => '0842492934',
                'publisher_address' => 'jl.sungai ciliwung, Jakarta Barat',
            ],
            [

                'publisher_name' => 'Gramedia',
                'publisher_email' => 'kantapustaka@gmail.com',
                'publisher_telp' => '0842492934',
                'publisher_address' => 'jl.sungai ciliwung, Jakarta Barat',
            ],

        ];

        foreach ($publishers as $data) {
            Publisher::create($data);
        }
    }
}
