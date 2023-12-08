<?php

// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Mystery',
        ]);

        Category::create([
            'name' => 'Romance',
        ]);

        Category::create([
            'name' => 'Fantasy',
        ]);

        Category::create([
            'name' => 'Science Fiction',
        ]);

        Category::create([
            'name' => 'Biography',
        ]);

        Category::create([
            'name' => 'Self-Help',
        ]);

        Category::create([
            'name' => 'History',
        ]);
    }
}
