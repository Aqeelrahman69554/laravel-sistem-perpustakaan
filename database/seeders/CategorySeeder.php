<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // standar penulisan laravel modern
        $categories = [
            'Agama',
            'Sejarah',
            'Ekonomi',
            'Ilmu Pengetahuan Sosial',
            'Bisnis',
            'Manajemen',
            'Novel',
            'Sains',
            'Teknologi',
            'Psikologi',
            'Geografi',
        ];

        foreach ($categories as $category) {
            Category::create([
                'categories_name' => $category,
            ]);
        }
    }
}
