<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert(
            [
                [
                    'nama' => 'Informatika'
                ],
                [
                    'nama' => 'Industri'
                ],
                [
                    'nama' => 'Sipil'
                ]
            ]
        );
    }
}
