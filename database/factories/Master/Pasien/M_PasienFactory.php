<?php

namespace Database\Factories\Master\Pasien;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Master\Pasien\M_Pasien>
 */
class M_PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $no_rm_1 = 00;
        static $no_rm_2 = 00;
        static $no_rm_3 = 00;

        $no_rm_2 = $no_rm_2 + 1;

        if ($no_rm_2 > 99) {
            $no_rm_2 = 00;
            $no_rm_3 = $no_rm_3 + 1;

            if ($no_rm_3 > 99) {
                $no_rm_3 = 00;
                $no_rm_1 = $no_rm_1 + 1;
            }
        }

        //menggabungkan No RM
        $no_rm = str_pad($no_rm_1, 2, '0', STR_PAD_LEFT) . '.' .str_pad($no_rm_2, 2, '0', STR_PAD_LEFT) . '.' .str_pad($no_rm_3, 2, '0', STR_PAD_LEFT);

        $status = $this->faker->randomElement(['Aktif', 'Tidak Aktif']);

        if ($status == 'Tidak Aktif') {
            $alasan_tidak_aktif = $this->faker->randomElement(['Meninggal', 'Pindah', 'Lainnya']);
        } else {
            $alasan_tidak_aktif = null;
        }

        return [
            'uuid' => Str::uuid()->toString(),
            'no_rm' => $no_rm,
            'no_bpjs' => $this->faker->unique()->numerify('##########'),
            'nik' => $this->faker->unique()->numerify('###############'),
            'nama_depan' => $this->faker->firstName(),
            'nama_belakang' => $this->faker->lastName(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'status_hubungan' => $this->faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak']),
            'nama_orangtua' => $this->faker->name(),
            'no_telepon' => $this->faker->unique()->numerify('###########'),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'provinsi' => $this->faker->state(),
            'kabupaten' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kelurahan' => $this->faker->city(),
            'rt' => $this->faker->numerify('##'),
            'rw' => $this->faker->numerify('##'),
            'tanggal_pendaftaran' => Carbon::now(),
            'jenis_layanan' => $this->faker->randomElement([1,2]),
            'status' => $status,
            'alasan_tidak_aktif' => $alasan_tidak_aktif,
        ];
    }
}
