<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Resepsionis\RP_PatientExamination;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $getData = RP_PatientExamination::with('patient')->where(function ($query) use ($search) {
            $query->where('no_rm', 'like', '%' . $search . '%')
                ->orWhere('no_registrasi', 'like', '%' . $search . '%');
        })
        ->whereDate('tanggal_pendaftaran', Carbon::now())
        ->orderBy('status', 'asc')
        ->orderBy('tanggal_pendaftaran', 'asc')
        ->paginate(RP_PatientExamination::all()->count() / 10);
        
        return view('components.resepsionis.patient-examination.index', compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.resepsionis.patient-examination.create');
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
    public function show(RP_PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RP_PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RP_PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RP_PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Get patient data
     */
    public function getPatient(Request $request)
    {
        $keyword = $request->input('keyword');

        // Query database untuk mencari data berdasarkan keyword
        $results = RP_PatientExamination::where('no_rm', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'desc')
            ->limit(5)->get();   // Ambil 5 data teratas

        // atur data apa aja yang akan di kirim ke view
        $data = [];
        foreach ($results as $result) {
            $data[] = [
                'name' => $result->id_customer . ' - ' . $result->nama_customer,
            ];
        }
        // Kirimkan hasil ke view sebagai JSON
        return response()->json([
            'results' => $data
        ]);
        return view('components.resepsionis.patient-examination.index', compact('getData'));
    }
}
