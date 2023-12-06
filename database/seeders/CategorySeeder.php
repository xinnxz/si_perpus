<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Kategori data
        $categories = [
            ['name' => 'Fiksi'],
            ['name' => 'Kartun'],
            ['name' => 'Misteri'],
            ['name' => 'Horror'],
            ['name' => 'Romance'],
            ['name' => 'Dokumentasi'],
            ['name' => 'Pendidikan'],
            // Tambahkan kategori lain sesuai kebutuhan
        ];

        // Insert data into categories table
        DB::table('categories')->insert($categories);
    }
}
