<?php

namespace Database\Seeders\account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

# Call the Model
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getRoleDeveloper = Role::where('role', 'developer')->first();
        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Developer-SIMK',
            'email' => 'DevKurir@gmail.com',
            'password' => Hash::make('12345678'),
            'role_uuid' =>  $getRoleDeveloper->uuid,
            'remember_token' => Str::random(10),
        ]);

        $getRoleResepsionis = Role::where('role', 'resepsionis')->first();
        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Resepsionis',
            'email' => 'resepsionis@gmail.com',
            'password' => Hash::make('12345678'),
            'role_uuid' =>  $getRoleResepsionis->uuid,
            'remember_token' => Str::random(10),
        ]);

        $getRoleStaffKlinik = Role::where('role', 'staffKlinik')->first();
        User::create([
            'uuid' => Str::uuid(),
            'name' => 'StaffKlnik',
            'email' => 'staffklinik@gmail.com',
            'password' => Hash::make('12345678'),
            'role_uuid' =>  $getRoleStaffKlinik->uuid,
            'remember_token' => Str::random(10),
        ]);
    }
}
