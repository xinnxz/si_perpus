<?php

// database/seeders/BookshelfSeeder.php

namespace Database\Seeders;

use App\Models\Bookshelf;
use Illuminate\Database\Seeder;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bookshelf::create([
            'code' => 'FIC',
            'name' => 'Fiction',
        ]);

        Bookshelf::create([
            'code' => 'NFIC',
            'name' => 'Non-Fiction',
        ]);

        Bookshelf::create([
            'code' => 'SCI',
            'name' => 'Science and Mathematics',
        ]);

        Bookshelf::create([
            'code' => 'TECH',
            'name' => 'Technology and Computer',
        ]);

        Bookshelf::create([
            'code' => 'ART',
            'name' => 'Art and Design',
        ]);

        Bookshelf::create([
            'code' => 'BUS',
            'name' => 'Business and Finance',
        ]);

        Bookshelf::create([
            'code' => 'EDU',
            'name' => 'Education',
        ]);
    }
}
