<?php

namespace Database\Factories\Resepsionis;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Master\Pasien\M_Pasien;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RP_PatientExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getPasien = M_Pasien::select('no_rm')->get();

        $no_registrasi = 'REG-'.''.date('Ymd').'-'.$this->faker->unique()->numerify('######');

        $now = Carbon::now();
        $factoryMonthsNow = $this->faker->dateTimeBetween($startDate = '2022-01-01', $endDate = '2023-12-31', $timezone = null);

        return [
            'uuid' => Str::uuid()->toString(),
            'no_rm' => $getPasien->random()->no_rm,
            'no_registrasi' => $no_registrasi,
            'alergi_makanan' => $this->faker->randomElement(['Ya', 'Tidak']),
            'alergi_udara' => $this->faker->randomElement(['Ya', 'Tidak']),
            'alergi_obat' => $this->faker->randomElement(['Ya', 'Tidak']),
            'nama_penanggung_jawab' => $this->faker->name(),
            'hubungan' => $this->faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak']),
            'catatan' => $this->faker->text(),
            'nik_penanggung_jawab' => $this->faker->unique()->numerify('###############'),
            'no_telepon_penanggung_jawab' => $this->faker->unique()->numerify('##########'),
            'pekerjaan_penanggung_jawab' => $this->faker->jobTitle(),
            'status' => $this->faker->randomElement([1, 2]),
            'tanggal_pendaftaran' => $factoryMonthsNow,
            'jenis_kunjungan' => $this->faker->randomElement([1, 2]),
            'jenis_layanan' => $this->faker->randomElement([1, 2]),
            'poli_tujuan' => $this->faker->randomElement([1, 2]),
            'berat_badan' => $this->faker->numberBetween(40, 100),
            'tinggi_badan' => $this->faker->numberBetween(140, 180),
            'suhu_badan' => $this->faker->randomFloat(1, 36, 40),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'sistole' => $this->faker->numberBetween(100, 140),
            'diastole' => $this->faker->numberBetween(60, 90),
        ];
    }
}
