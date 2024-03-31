<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

# Call the models
use App\Models\Master\Wilayah\M_Kabupaten;
use App\Models\Master\Wilayah\M_Kecamatan;
use App\Models\Master\Wilayah\M_Kelurahan;
use App\Models\Master\Wilayah\M_Provinsi;

class M_WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_prov = storage_path('json/provinsi.json');
        $file_kab = storage_path('json/kabupaten.json');
        $file_kec = storage_path('json/kecamatan.json');
        $file_kel = storage_path('json/kelurahan.json');

        $prov = json_decode(file_get_contents($file_prov), true);
        $kab = json_decode(file_get_contents($file_kab), true);
        $kec = json_decode(file_get_contents($file_kec), true);
        $kel = json_decode(file_get_contents($file_kel), true);

        foreach ($prov as $p) {
            M_Provinsi::create([
                'name' => $p['name'],
                'code' => $p['code'],
            ]);
        }

        foreach ($kab as $k) {
            M_Kabupaten::create([
                'provinsi_id' => $k['provinsi_id'],
                'type' => $k['type'],
                'name' => $k['name'],
                'code' => $k['code'],
                'full_code' => $k['full_code'],
            ]);
        }

        foreach ($kec as $k) {
            M_Kecamatan::create([
                'kabupaten_id' => $k['kabupaten_id'],
                'code' => $k['code'],
                'name' => $k['name'],
                'full_code' => $k['full_code'],
            ]);
        }

        foreach ($kel as $k) {
            M_Kelurahan::create([
                'kecamatan_id' => $k['kecamatan_id'],
                'code' => $k['code'],
                'name' => $k['name'],
                'full_code' => $k['full_code'],
                'pos_code' => $k['pos_code'],
            ]);
        }
    }
}
