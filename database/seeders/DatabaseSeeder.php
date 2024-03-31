<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

# Call the Model
use App\Models\Master\Pasien\M_Pasien;
use App\Models\Resepsionis\RP_PatientExamination;

# Call the Seeder
use Database\Seeders\Account\RoleSeeder;
use Database\Seeders\Account\UserSeeder;
use Database\Seeders\Inventori\I_ObatSeeder;
use Database\Seeders\Master\M_ICD10Seeder;
use Database\Seeders\Master\M_WilayahSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the Seeder class
        $this->call([
            M_WilayahSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            I_ObatSeeder::class,
            M_ICD10Seeder::class,
        ]);

        M_Pasien::factory(200)->create();
        RP_PatientExamination::factory(1000)->create();
    }
}
