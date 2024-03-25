<?php

namespace Database\Seeders\account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

# Call the Model
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'uuid' => Str::uuid(),
            'role' => 'developer',
            'get' => 1,
            'post' => 1,
            'put' => 1,
            'delete' => 1,
            'restore' => 1,
            'force-delete' => 1,
            'trash' => 1,
        ]);

        Role::create([
            'uuid' => Str::uuid(),
            'role' => 'resepsionis',
            'get' => 1,
            'post' => 1,
            'put' => 1,
            'delete' => 1,
            'restore' => 0,
            'force-delete' => 0,
            'trash' => 0,
        ]);

        Role::create([
            'uuid' => Str::uuid(),
            'role' => 'staffKlinik',
            'get' => 1,
            'post' => 1,
            'put' => 1,
            'delete' => 1,
            'restore' => 0,
            'force-delete' => 0,
            'trash' => 0,
        ]);
    }
}
