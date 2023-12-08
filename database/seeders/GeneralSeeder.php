<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create([
            'name' => 'admin'
        ]);

        $role_mahasiswa = Role::create([
            'name' => 'mahasiswa'
        ]);

        $permissions = ['create', 'update', 'read', 'delete'];

        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        $mahasiswa = User::create([
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mahasiswa->assignRole('mahasiswa');
        $mahasiswa->givePermissionTo('read');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin->assignRole('admin');
        $admin->givePermissionTo($permissions);

    }
}
