<?php

namespace Database\Factories\Master\Pasien;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Carbon\Carbon;

# Call the model
use App\Models\Master\Wilayah\M_Provinsi;
use App\Models\Master\Wilayah\M_Kabupaten;
use App\Models\Master\Wilayah\M_Kecamatan;
use App\Models\Master\Wilayah\M_Kelurahan;

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

        $get_provinsi = M_Provinsi::all()->random();
        $get_kabupaten = M_Kabupaten::where('provinsi_id', $get_provinsi->id)->get()->random();
        $get_kecamatan = M_Kecamatan::where('kabupaten_id', $get_kabupaten->id)->get()->random();
        $get_kelurahan = M_Kelurahan::where('kecamatan_id', $get_kecamatan->id)->get()->random();

        return [
            'uuid' => Str::uuid()->toString(),
            'no_rm' => $no_rm,
            'no_bpjs' => $this->faker->unique()->numerify('##########'),
            'nik' => $this->faker->unique()->numerify('###############'),
            'nama_depan' => $this->faker->firstName(),
            'nama_belakang' => $this->faker->lastName(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'status_menikah' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Janda', 'Duda']),
            'nama_orangtua' => $this->faker->name(),
            'no_telepon' => $this->faker->unique()->numerify('###########'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'gol_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'provinsi' => $get_provinsi->id,
            'kabupaten' => $get_kabupaten->id,
            'kecamatan' => $get_kecamatan->id,
            'kelurahan' => $get_kelurahan->id,
            'alamat_ktp' => $this->faker->address(),
            'alamat_domisili' => $this->faker->address(),
            'alergi_makanan' => $this->faker->randomElement(['Ya', 'Tidak']),
            'alergi_udara' => $this->faker->randomElement(['Ya', 'Tidak']),
            'alergi_obat' => $this->faker->randomElement(['Ya', 'Tidak']),
            'hubungan_penanggung_jawab' => $this->faker->randomElement(['Orang Tua', 'Suami', 'Istri', 'Anak']),
            'nik_penanggung_jawab' => $this->faker->unique()->numerify('###############'),
            'nama_penanggung_jawab' => $this->faker->name(),
            'no_telepon_penanggung_jawab' => $this->faker->unique()->numerify('###########'),
            'alamat_penanggung_jawab' => $this->faker->address(),
            'pekerjaan_penanggung_jawab' => $this->faker->jobTitle(),
            'tanggal_pendaftaran' => Carbon::now(),
            'status' => $status,
            'alasan_tidak_aktif' => $alasan_tidak_aktif,
        ];
    }
}
