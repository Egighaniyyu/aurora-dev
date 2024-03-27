<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

# Call the Model
use App\Models\Resepsionis\RP_PatientData;
use App\Models\Master\Pasien\M_Pasien;
use App\Models\Master\Wilayah\M_Provinsi;
use App\Models\Master\Wilayah\M_Kabupaten;
use App\Models\Master\Wilayah\M_Kecamatan;
use App\Models\Master\Wilayah\M_Kelurahan;

class PatientDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $getData = M_Pasien::where(function ($query) use ($search) {
            $query->where('no_rm', 'like', '%' . $search . '%')
                ->orWhere('nama_depan', 'like', '%' . $search . '%')
                ->orWhere('nama_belakang', 'like', '%' . $search . '%')
                ->orWhere('no_bpjs', 'like', '%' . $search . '%')
                ->orWhere('no_telepon', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
        })
        ->where('status', 'aktif')
        ->orderBy('tanggal_pendaftaran', 'desc')
        ->paginate(10);

        return view('components.resepsionis.patient-data.index', compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getProvince = M_Provinsi::all();

        $newNoRM = self::getLastNoRM();
        return view('components.resepsionis.patient-data.create', compact('newNoRM', 'getProvince'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $getProvince = M_Provinsi::find($request->provinsi)->name;
        $getCity = M_Kabupaten::find($request->kotaKab)->name;
        $getDistrict = M_Kecamatan::find($request->kecamatan)->name;
        $getVillage = M_Kelurahan::find($request->desaKel)->name;

        dd($getProvince, $getCity, $getDistrict, $getVillage);
    }

    /**
     * Display the specified resource.
     */
    public function show(RP_PatientData $patientData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RP_PatientData $patientData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RP_PatientData $patientData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RP_PatientData $patientData)
    {
        //
    }

    /**
     * Get the last no_rm from model
     */
    public function getLastNoRM()
    {
        // Start Make No RM
        $trashPasien = M_Pasien::onlyTrashed()->get(); // ambil data pasien yang dihapus
        $no_rm = 'use'; // default value
        // jika ada data selain yang ditemukan di database pasien maka ambil no_rm yang pertama
        if ($trashPasien && $trashPasien->count() > 0) {
            foreach ($trashPasien as $pasien) {
                $no_rm = explode('-', $pasien->no_rm);

                if ($no_rm[0] == 'del') {
                    $no_rm = $no_rm[1];
                    break;
                }
            }
        }

        // jika no_rm tidak sama dengan use maka update no_rm yang dihapus menjadi use
        if ($no_rm != 'use') {
            $findRM = M_Pasien::onlyTrashed()->where('no_rm', 'del-'.$no_rm)->first();
            $findRM->update([
                'no_rm' => 'use',
            ]);
        }
        else {
            //jika belum ada data pasien
            if (M_Pasien::count() < 1) {
                $no_rm = '00'.'.'.'01'.'.'.'00';
            }
            else {
                //No RM Otomatis
                $no_rm = M_Pasien::pluck('no_rm')->toArray();

                $no_rmSamaMaxLeft = [];
                $no_rmSamaMaxRight = [];
                $no_rmSamaMaxMid = [];

                foreach ($no_rm as $no) {
                    [$left, $mid, $right] = explode('.', $no);
                    $no_rmSamaMaxLeft[$left][] = $no;
                }
                
                $maxLeft = max(array_keys($no_rmSamaMaxLeft));
                foreach ($no_rmSamaMaxLeft[$maxLeft] as $no) {
                    [$left, $mid, $right] = explode('.', $no);
                    $no_rmSamaMaxRight[$right][] = $no;
                }
                
                $maxRight = max(array_keys($no_rmSamaMaxRight));
                foreach ($no_rmSamaMaxRight[$maxRight] as $no) {
                    [$left, $mid, $right] = explode('.', $no);
                    $no_rmSamaMaxMid[$mid][] = $no;
                }

                $maxMid = max(array_keys($no_rmSamaMaxMid));
                $no_rmSamaMaxMid = $no_rmSamaMaxMid[$maxMid];

                $no_rm = explode('.', $no_rmSamaMaxMid[0]);
                $no_rm[1] = $no_rm[1] + 1;

                if($no_rm[1] > 99){
                    $no_rm[1] = 0;
                    $no_rm[2] = $no_rm[2] + 1;

                    if($no_rm[2] > 99){
                        $no_rm[2] = 0;
                        $no_rm[0] = $no_rm[0] + 1;

                        if($no_rm[0] > 99){
                            $no_rm[0] = 99;
                            $no_rm[1] = 99;
                            $no_rm[2] = 99;

                            return response()->json([
                                'status' => false,
                                'message' => 'No Rekam Medis Sudah Maksimal',
                            ], Response::HTTP_INTERNAL_SERVER_ERROR);
                        }
                    }
                }
                //menggabungkan No RM
                $no_rm = str_pad($no_rm[0], 2, '0', STR_PAD_LEFT).'.'.str_pad($no_rm[1], 2, '0', STR_PAD_LEFT).'.'.str_pad($no_rm[2], 2, '0', STR_PAD_LEFT);

                // check if no_rm already exists
                if (M_Pasien::where('no_rm', $no_rm)->exists()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Gagal Membuat No RM',
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }
        
        $checkNORM = M_Pasien::where('no_rm', $no_rm)->first();
        if ($checkNORM != null) {
            return response()->json([
                'status' => false,
                'message' => 'No RM Sudah Ada',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // End Make No RM
        return $no_rm;
    }

    /**
     * Get the city from province
     */
    public function getCities(Request $request)
    {
        $city = M_Kabupaten::where('provinsi_id', $request->provinsi_id)->get();

        return response()->json($city);
    }

    /**
     * Get the district from city
     */
    public function getDistrict(Request $request)
    {
        $district = M_Kecamatan::where('kabupaten_id', $request->kota_kab_id)->get();

        return response()->json($district);
    }

    /**
     * Get the village from district
     */
    public function getVillage(Request $request)
    {
        $village = M_Kelurahan::where('kecamatan_id', $request->kecamatan_id)->get();

        return response()->json($village);
    }
}
