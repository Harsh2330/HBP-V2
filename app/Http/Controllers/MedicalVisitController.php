<?php

namespace App\Http\Controllers;

use App\Models\MedicalVisit;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalVisitController extends Controller
{
    // Display a listing of the medical visits
    public function index()
    {
        $medicalVisits = MedicalVisit::with('patient')->paginate(10); // Removed 'doctor' and 'nurse'
        return view('medical_visit.index', compact('medicalVisits'));
    }

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
            'visit_date' => 'required|date',
            'doctor_name' => 'required|string',
            'nurse_name' => 'required|string',
            'diagnosis' => 'required|string',
            'simplified_diagnosis' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'heart_rate' => 'nullable|string',
            'temperature' => 'nullable|string',
            'weight' => 'nullable|string',
            'ongoing_treatments' => 'nullable|string',
            'medications_prescribed' => 'nullable|string',
            'procedures' => 'nullable|string',
            'doctor_notes' => 'nullable|string',
            'nurse_observations' => 'nullable|string',
        ]);

        $patient = User::findOrFail($request->patient_id);
        $medicalVisit = new MedicalVisit($request->all());
        $medicalVisit->unique_id = $patient->unique_id;
        $medicalVisit->save();

        return redirect()->route('medical_visit.index')->with('status', 'Medical visit created successfully!');
    }

    // Show the details of a specific medical visit
    public function show($id)
    {
        $visit = MedicalVisit::with('patient')->findOrFail($id); // Removed 'doctor' and 'nurse'
        return view('medical_visit.show', compact('visit'));
    }
}
