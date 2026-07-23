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
                'books_image'     => 'atomic-habits.jpg',
                'books_isbn'      => '9786020633176',
                'books_title'     => 'Atomic Habits',
                'category'        => 'Psikologi',
                'books_author'    => 'James Clear',
                'books_synopsis'  => 'Panduan membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
                'publisher'       => 'Gramedia',
                'books_published' => '2019',
                'books_stock'     => 15,
                'books_location'  => 'Rak A1',
            ],
            [
                'books_image'     => 'clean-code.jpg',
                'books_isbn'      => '9780132350884',
                'books_title'     => 'Clean Code',
                'category'        => 'Teknologi',
                'books_author'    => 'Robert C. Martin',
                'books_synopsis'  => 'Prinsip-prinsip menulis kode yang bersih dan mudah dipelihara.',
                'publisher'       => 'Prentice Hall',
                'books_published' => '2008',
                'books_stock'     => 10,
                'books_location'  => 'Rak IT-01',
            ],
            [
                'books_image'     => 'laskar-pelangi.jpg',
                'books_isbn'      => '9789793062792',
                'books_title'     => 'Laskar Pelangi',
                'category'        => 'Novel',
                'books_author'    => 'Andrea Hirata',
                'books_synopsis'  => 'Perjuangan anak-anak Belitung dalam meraih pendidikan.',
                'publisher'       => 'Bentang Pustaka',
                'books_published' => '2005',
                'books_stock'     => 20,
                'books_location'  => 'Rak N-02',
            ],
        ];

        foreach ($books as $book) {

            $category = Category::where('categories_name', $book['category'])->first();

            $publisher = Publisher::where('publisher_name', $book['publisher'])->first();
            
            Book::create([
                'books_image'     => $book['books_image'],
                'books_isbn'      => $book['books_isbn'],
                'books_title'     => $book['books_title'],
                'category_id'     => $category->id,
                'books_author'    => $book['books_author'],
                'books_synopsis'  => $book['books_synopsis'],
                'publisher_id'    => $publisher->id,
                'books_published' => $book['books_published'],
                'books_stock'     => $book['books_stock'],
                'books_location'  => $book['books_location'],
            ]);
        }
    }
}
