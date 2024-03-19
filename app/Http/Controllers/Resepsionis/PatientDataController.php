<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Resepsionis\PatientData;
use Illuminate\Http\Request;

class PatientDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resepsionis.patient-data.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resepsionis.patient-data.create');
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
    public function show(PatientData $patientData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientData $patientData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientData $patientData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientData $patientData)
    {
        //
    }
}
