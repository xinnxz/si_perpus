<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Roles data
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Member'],
        ];

        // Insert data into roles table
        DB::table('roles')->insert($roles);
    }
}
