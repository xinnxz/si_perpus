<?php

// File: Database/Seeders/BookSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data
        $books = [
            [
                'title' => 'Sample Book 1',
                'author' => 'Author 1',
                'year' => 2022,
                'publisher' => 'Publisher 1',
                'city' => 'City 1',
                'cover' => 'cover1.jpg',
                'quantity' => 10,
                'bookshelf_id' => 1,
                'category_id' => 1,
            ],
            [
                'title' => 'Sample Book 2',
                'author' => 'Author 2',
                'year' => 2023,
                'publisher' => 'Publisher 2',
                'city' => 'City 2',
                'cover' => 'cover2.jpg',
                'quantity' => 15,
                'bookshelf_id' => 2,
                'category_id' => 2,
            ],
            // Add more books as needed
        ];

        // Insert data into the books table
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
