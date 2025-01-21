<?php

namespace App\Http\Controllers;

use App\Models\MedicalVisit;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalVisitController extends Controller
{
    // Show the form for creating a new medical visit
    public function create()
    {
        // Ensure this retrieves patients correctly
        $patients = User::where('usertype', 'patient')->get();
        return view('medical_visit.create', compact('patients'));
    }

    // Store a newly created medical visit
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'treatment' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $medicalVisit = new MedicalVisit;
        $medicalVisit->patient_id = $request->patient_id;
        $medicalVisit->treatment = $request->treatment;
        $medicalVisit->notes = $request->notes;
        $medicalVisit->save();

        return redirect()->route('medical_visit.index')->with('status', 'Medical visit created successfully!');
    }
}
