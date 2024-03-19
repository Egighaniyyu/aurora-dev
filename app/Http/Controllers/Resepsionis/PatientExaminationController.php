<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Resepsionis\PatientExamination;
use Illuminate\Http\Request;

class PatientExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resepsionis.patient-examination');
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
    public function show(PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientExamination $patientExamination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientExamination $patientExamination)
    {
        //
    }
}
