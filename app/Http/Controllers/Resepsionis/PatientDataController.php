<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;

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
        $newNoRM = self::getLastNoRM();
        return view('components.resepsionis.patient-data.create', compact('newNoRM'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'noRm' => 'required|string|unique:m__pasiens,no_rm',
            'noBpjs' => 'numeric|digits:13|unique:m__pasiens,no_bpjs',
            'nik' => 'required|numeric|digits:16|unique:m__pasiens,nik',
            'namaDepan' => 'required|string',
            'namaBelakang' => 'string',
            'tanggalLahir' => 'required|date',
            'statusMenikah' => 'required|string',
            'jenisKelamin' => 'required|in:Laki-Laki,Perempuan',
            'namaOrtu' => 'required|string',
            'noTelepon' => 'required|numeric|digits_between:10,13',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'golDarah' => 'in:A,B,AB,O',
            'provinsi' => 'required|exists:m__provinsis,id|numeric',
            'kotaKab' => 'required|exists:m__kabupatens,id|numeric',
            'kecamatan' => 'required|exists:m__kecamatans,id|numeric',
            'desaKel' => 'required|exists:m__kelurahans,id|numeric',
            'alamatKTP' => 'required|string',
            'checkDomisKtp' => 'required|between:0,1',
            'makanan' => 'string',
            'udara' => 'string',
            'obat' => 'string',
            'hubungaPenanggungJawab' => 'required|string',
            'nikPenanggungJawab' => 'required|numeric|digits:16',
            'namaPenanggungJawab' => 'required|string',
            'noPenanggungJawab' => 'numeric|digits_between:10,13',
            'alamatPenanggungJawab' => 'string',
            'pekerjaanPenanggungJawab' => 'string',
        ], [
            'required' => ':attribute tidak boleh kosong',
            'exists' => ':attribute tidak ditemukan',
            'numeric' => ':attribute harus berupa angka',
            'string' => ':attribute harus berupa huruf',
            'date' => ':attribute harus berupa tanggal',
            'in' => ':attribute tidak sesuai',
            'between' => ':attribute tidak sesuai',
            'unique' => ':attribute sudah terdaftar',
            'digits' => ':attribute harus :digits digit',
            'digits_between' => ':attribute harus antara :min dan :max digit',
        ], [
            'noRm' => 'No RM',
            'npBpjs' => 'No BPJS',
            'nik' => 'NIK',
            'namaDepan' => 'Nama Depan',
            'namaBelakang' => 'Nama Belakang',
            'tanggalLahir' => 'Tanggal Lahir',
            'statusMenikah' => 'Status Menikah',
            'jenisKelamin' => 'Jenis Kelamin',
            'namaOrtu' => 'Nama Orang Tua',
            'noTelepon' => 'No Telepon',
            'agama' => 'Agama',
            'golDarah' => 'Golongan Darah',
            'provinsi' => 'Provinsi',
            'kotaKab' => 'Kota/Kabupaten',
            'kecamatan' => 'Kecamatan',
            'desaKel' => 'Desa/Kelurahan',
            'alamatKTP' => 'Alamat KTP',
            'checkDomisktp' => 'Domisili Sama dengan KTP',
            'makanan' => 'Makanan',
            'udara' => 'Udara',
            'obat' => 'Obat',
            'hubungaPenanggungJawab' => 'Hubungan Penanggung Jawab',
            'nikPenanggungJawab' => 'NIK Penanggung Jawab',
            'namaPenanggungJawab' => 'Nama Penanggung Jawab',
            'noPenanggungJawab' => 'No Telepon Penanggung Jawab',
            'alamatPenanggungJawab' => 'Alamat Penanggung Jawab',
            'pekerjaanPenanggungJawab' => 'Pekerjaan Penanggung Jawab',
        ]);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), 'Failed');
            \Log::error('Error Store Data Pasien: '.$validate->errors()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }

        try {
            $store = M_Pasien::create([
                'uuid' => (string) \Str::uuid(),
                'no_rm' => $request->noRm,
                'no_bpjs' => $request->noBpjs,
                'nik' => $request->nik,
                'nama_depan' => $request->namaDepan,
                'nama_belakang' => $request->namaBelakang,
                'tanggal_lahir' => $request->tanggalLahir,
                'jenis_kelamin' => $request->jenisKelamin,
                'status_menikah' => $request->statusMenikah,
                'nama_orangtua' => $request->namaOrtu,
                'no_telepon' => $request->noTelepon,
                'agama' => $request->agama,
                'gol_darah' => $request->golDarah,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kotaKab,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->desaKel,
                'alamat_ktp' => $request->alamatKTP,
                'alamat_domisili' => $request->alamatDomisili == null ? $request->alamatKTP : $request->alamatDomisili,
                'alergi_makanan' => $request->makanan,
                'alergi_udara' => $request->udara,
                'alergi_obat' => $request->obat,
                'hubungan_penanggung_jawab' => $request->hubungaPenanggungJawab,
                'nik_penanggung_jawab' => $request->nikPenanggungJawab,
                'nama_penanggung_jawab' => $request->namaPenanggungJawab,
                'no_telepon_penanggung_jawab' => $request->noPenanggungJawab,
                'alamat_penanggung_jawab' => $request->alamatPenanggungJawab,
                'pekerjaan_penanggung_jawab' => $request->pekerjaanPenanggungJawab,
                'tanggal_pendaftaran' => now(),
                'status' => 'aktif',
            ]);

            toastr()->success('Data Pasien Berhasil Ditambahkan', 'Success');
            \Log::info('Success Store Data Pasien: '.$store);
            return redirect()->route('data-pasien.index')->with('success create', 'Data Pasien Berhasil Ditambahkan');
        } catch (\Exception $e) {
            toastr()->error('Data Pasien Gagal Ditambahkan', 'Failed');
            \Log::error('Error Store Data Pasien: '.$e->getMessage());
            return redirect()->back()->withInput();
        }
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
    public function edit(RP_PatientData $patientData, string $id)
    {
        $getData = M_Pasien::find($id);
        return view('components.resepsionis.patient-data.edit', compact('getData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RP_PatientData $patientData, string $id)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'noRm' => 'required|string|exists:m__pasiens,no_rm',
            'noBpjs' => 'numeric|digits:13',
            'nik' => 'required|numeric|digits:16',
            'namaDepan' => 'required|string',
            'namaBelakang' => 'string',
            'tanggalLahir' => 'required|date',
            'statusMenikah' => 'required|string',
            'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
            'namaOrtu' => 'required|string',
            'noTelepon' => 'required|numeric|digits_between:10,13',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'golDarah' => 'in:A,B,AB,O',
            'provinsi' => 'required|exists:m__provinsis,id|numeric',
            'kotaKab' => 'required|exists:m__kabupatens,id|numeric',
            'kecamatan' => 'required|exists:m__kecamatans,id|numeric',
            'desaKel' => 'required|exists:m__kelurahans,id|numeric',
            'alamatKTP' => 'required|string',
            'checkDomisKtp' => 'required|between:0,1',
            'makanan' => 'string',
            'udara' => 'string',
            'obat' => 'string',
            'hubungaPenanggungJawab' => 'required|string',
            'nikPenanggungJawab' => 'required|numeric|digits:16',
            'namaPenanggungJawab' => 'required|string',
            'noPenanggungJawab' => 'numeric|digits_between:10,13',
            'alamatPenanggungJawab' => 'string',
            'pekerjaanPenanggungJawab' => 'string',
        ], [
            'required' => ':attribute tidak boleh kosong',
            'exists' => ':attribute tidak ditemukan',
            'numeric' => ':attribute harus berupa angka',
            'string' => ':attribute harus berupa huruf',
            'date' => ':attribute harus berupa tanggal',
            'in' => ':attribute tidak sesuai',
            'between' => ':attribute tidak sesuai',
            'unique' => ':attribute sudah terdaftar',
            'digits' => ':attribute harus :digits digit',
            'digits_between' => ':attribute harus antara :min dan :max digit',
        ], [
            'noRm' => 'No RM',
            'npBpjs' => 'No BPJS',
            'nik' => 'NIK',
            'namaDepan' => 'Nama Depan',
            'namaBelakang' => 'Nama Belakang',
            'tanggalLahir' => 'Tanggal Lahir',
            'statusMenikah' => 'Status Menikah',
            'jenisKelamin' => 'Jenis Kelamin',
            'namaOrtu' => 'Nama Orang Tua',
            'noTelepon' => 'No Telepon',
            'agama' => 'Agama',
            'golDarah' => 'Golongan Darah',
            'provinsi' => 'Provinsi',
            'kotaKab' => 'Kota/Kabupaten',
            'kecamatan' => 'Kecamatan',
            'desaKel' => 'Desa/Kelurahan',
            'alamatKTP' => 'Alamat KTP',
            'checkDomisktp' => 'Domisili Sama dengan KTP',
            'makanan' => 'Makanan',
            'udara' => 'Udara',
            'obat' => 'Obat',
            'hubungaPenanggungJawab' => 'Hubungan Penanggung Jawab',
            'nikPenanggungJawab' => 'NIK Penanggung Jawab',
            'namaPenanggungJawab' => 'Nama Penanggung Jawab',
            'noPenanggungJawab' => 'No Telepon Penanggung Jawab',
            'alamatPenanggungJawab' => 'Alamat Penanggung Jawab',
            'pekerjaanPenanggungJawab' => 'Pekerjaan Penanggung Jawab',
        ]);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), 'Failed');
            \Log::error('Error Update Data Pasien: '.$validate->errors()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }

        try {   
            $patientData = M_Pasien::find($id);
            $patientData->update([
                'no_bpjs' => $request->noBpjs,
                'nik' => $request->nik,
                'nama_depan' => $request->namaDepan,
                'nama_belakang' => $request->namaBelakang,
                'tanggal_lahir' => $request->tanggalLahir,
                'jenis_kelamin' => $request->jenisKelamin,
                'status_menikah' => $request->statusMenikah,
                'nama_orangtua' => $request->namaOrtu,
                'no_telepon' => $request->noTelepon,
                'agama' => $request->agama,
                'gol_darah' => $request->golDarah,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kotaKab,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->desaKel,
                'alamat_ktp' => $request->alamatKTP,
                'alamat_domisili' => $request->alamatDomisili == null ? $request->alamatKTP : $request->alamatDomisili,
                'alergi_makanan' => $request->makanan,
                'alergi_udara' => $request->udara,
                'alergi_obat' => $request->obat,
                'hubungan_penanggung_jawab' => $request->hubungaPenanggungJawab,
                'nik_penanggung_jawab' => $request->nikPenanggungJawab,
                'nama_penanggung_jawab' => $request->namaPenanggungJawab,
                'no_telepon_penanggung_jawab' => $request->noPenanggungJawab,
                'alamat_penanggung_jawab' => $request->alamatPenanggungJawab,
                'pekerjaan_penanggung_jawab' => $request->pekerjaanPenanggungJawab,
            ]);

            toastr()->success('Data Pasien Berhasil Diubah', 'Success');
            \Log::info('Success Update Data Pasien: '. 'userID '. ': ' .Auth::user()->id.' - '.$patientData);
            return redirect()->route('data-pasien.index')->with('success update', 'Data Pasien Berhasil Diubah');
        } catch (\Exception $e) {
            toastr()->error('Data Pasien Gagal Diubah', 'Failed');
            \Log::error('Error Update Data Pasien: '.$e->getMessage(). ' Line: '.$e->getLine(). ' File: '.$e->getFile(). ' Code: '.$e->getCode());
            return redirect()->back()->withInput();
        }
        
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
     * Get the province from database
     */
    public function getProvinces()
    {
        $province = M_Provinsi::all();
        return response()->json($province);
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
