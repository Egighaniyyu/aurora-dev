<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

# call the model
use App\Models\Resepsionis\RP_Dashboard;
use App\Models\Resepsionis\RP_PatientExamination;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getPatientExamination = RP_PatientExamination::all();

        $totalPasien = $getPatientExamination->count();
        $pasienBelumDilayani = $getPatientExamination->where('status', 1)->count();
        $pasienSudahDilayani = $getPatientExamination->where('status', 2)->count();
        $totalUmum = $getPatientExamination->where('jenis_layanan', 1)->count();
        $totalBpjs = $getPatientExamination->where('jenis_layanan', 2)->count();
        $totalRujukan = $getPatientExamination->where('jenis_layanan', 3)->count();
        $jenisPasien = [$totalBpjs, $totalUmum, $totalRujukan];
        
        $layananUmumWeek = $getPatientExamination->where('jenis_layanan', 1)->where('created_at', '>=', now()->subWeek())->count();
        $layananBpjsWeek = $getPatientExamination->where('jenis_layanan', 2)->where('created_at', '>=', now()->subWeek())->count();
        $layananUmumMonth = $getPatientExamination->where('jenis_layanan', 1)->where('created_at', '>=', now()->subMonth())->count();
        $layananBpjsMonth = $getPatientExamination->where('jenis_layanan', 2)->where('created_at', '>=', now()->subMonth())->count();

        $getModels = new RP_PatientExamination;
        // Start Hitung jumlah pasien harian ini
            $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            foreach ($daysOfWeek as $day) {
                $dayDataUmum[] = $getModels::where('jenis_layanan', 1)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', date('m'))->whereDay('tanggal_pendaftaran', date('d', strtotime("$day this week")))->where('status', 2)->count();
                $dayDataBpjs[] = $getModels::where('jenis_layanan', 2)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', date('m'))->whereDay('tanggal_pendaftaran', date('d', strtotime("$day this week")))->where('status', 2)->count();
                $dayDataRujukan[] = $getModels::where('jenis_layanan', 3)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', date('m'))->whereDay('tanggal_pendaftaran', date('d', strtotime("$day this week")))->where('status', 2)->count();
                $dateDay[] = date('d M', strtotime("$day this week"));
            }
            // dd($dayDataUmum, $dayDataBpjs, $dayDataRujukan, $dateDay);
            
        // End Hitung jumlah pasien harian ini

        // Start Hitung jumlah pasien minggu ini
            foreach (range(1, 4) as $week) {
                $weekDataUmum[] = $getModels::where('jenis_layanan', 1)->whereYear('tanggal_pendaftaran', date('Y'))->where('status', 2)->where('tanggal_pendaftaran', '>=', now()->subWeeks($week))->count();
                $weekDataBpjs[] = $getModels::where('jenis_layanan', 2)->whereYear('tanggal_pendaftaran', date('Y'))->where('status', 2)->where('tanggal_pendaftaran', '>=', now()->subWeeks($week))->count();
                $weekDataRujukan[] = $getModels::where('jenis_layanan', 3)->whereYear('tanggal_pendaftaran', date('Y'))->where('status', 2)->where('tanggal_pendaftaran', '>=', now()->subWeeks($week))->count();
                // Week 1 mar
                $dateWeek[] = Carbon::now()->subWeeks($week)->format('d M');
            }
            // dd($weekDataUmum, $weekDataBpjs, $weekDataRujukan, $dateWeek);
        // End Hitung jumlah pasien minggu ini

        // Start Hitung jumlah pasien bulan ini
            foreach (range(1, 12) as $month) {
                $monthDataUmum[] = $getModels::where('jenis_layanan', 1)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', $month)->where('status', 2)->count();
                $monthDataBpjs[] = $getModels::where('jenis_layanan', 2)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', $month)->where('status', 2)->count();
                $monthDataRujukan[] = $getModels::where('jenis_layanan', 3)->whereYear('tanggal_pendaftaran', date('Y'))->whereMonth('tanggal_pendaftaran', $month)->where('status', 2)->count();
                $dateMonth[] = Carbon::createFromDate(date('Y'), $month, 1)->format('M Y');
            }
            // dd($monthDataUmum, $monthDataBpjs, $monthDataRujukan, $dateMonth);
        // End Hitung jumlah pasien bulan ini

        return view('components.resepsionis.index', compact(
            'totalPasien',
            'pasienBelumDilayani',
            'pasienSudahDilayani',
            'layananUmumWeek',
            'layananBpjsWeek',
            'layananUmumMonth',
            'layananBpjsMonth',
            'jenisPasien',
            
            'dayDataUmum',
            'dayDataBpjs',
            'dayDataRujukan',
            'dateDay',

            'weekDataUmum',
            'weekDataBpjs',
            'weekDataRujukan',
            'dateWeek',

            'monthDataUmum',
            'monthDataBpjs',
            'monthDataRujukan',
            'dateMonth'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RP_Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RP_Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RP_Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RP_Dashboard $dashboard)
    {
        //
    }
}
