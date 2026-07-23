<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'image'     => 'atomic-habits.jpg',
                'isbn'      => '9786020633176',
                'title'     => 'Atomic Habits',
                'category'        => 'Psikologi',
                'author'    => 'James Clear',
                'synopsis'  => 'Panduan membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
                'publisher'       => 'Gramedia',
                'year_published' => '2019',
                'stock'     => 15,
                'location'  => 'Rak A1',
            ],
            [
                'image'     => 'clean-code.jpg',
                'isbn'      => '9780132350884',
                'title'     => 'Clean Code',
                'category'        => 'Teknologi',
                'author'    => 'Robert C. Martin',
                'synopsis'  => 'Prinsip-prinsip menulis kode yang bersih dan mudah dipelihara.',
                'publisher'       => 'Prentice Hall',
                'year_published' => '2008',
                'stock'     => 10,
                'location'  => 'Rak IT-01',
            ],
            [
                'image'     => 'laskar-pelangi.jpg',
                'isbn'      => '9789793062792',
                'title'     => 'Laskar Pelangi',
                'category'        => 'Novel',
                'author'    => 'Andrea Hirata',
                'synopsis'  => 'Perjuangan anak-anak Belitung dalam meraih pendidikan.',
                'publisher'       => 'Bentang Pustaka',
                'year_published' => '2005',
                'stock'     => 20,
                'location'  => 'Rak N-02',
            ],
        ];

        foreach ($books as $book) {

            $category = Category::where('categories_name', $book['category'])->first();

            $publisher = Publisher::where('publisher_name', $book['publisher'])->first();

            Book::create([
                'image'     => $book['image'],
                'isbn'      => $book['isbn'],
                'title'     => $book['title'],
                'category_id'     => $category->id,
                'author'    => $book['author'],
                'synopsis'  => $book['synopsis'],
                'publisher_id'    => $publisher->id,
                'year_published' => $book['year_published'],
                'stock'     => $book['stock'],
                'location'  => $book['location'],
            ]);
        }
    }
}
