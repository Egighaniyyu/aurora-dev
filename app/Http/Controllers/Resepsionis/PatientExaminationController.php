<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Resepsionis\RP_PatientExamination;
use Illuminate\Http\Request;

class PatientExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.resepsionis.patient-examination.index');
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
}
