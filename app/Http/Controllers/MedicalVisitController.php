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
        $doctors = User::where('usertype', 'doctor')->get();
        $nurses = User::where('usertype', 'nurse')->get();

        return view('medical_visit.create', compact('patients', 'doctors', 'nurses'));
    }

    // Store a newly created medical visit
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'visit_date' => 'required|date',
            'doctor_id' => 'required|exists:users,id',
            'nurse_id' => 'required|exists:users,id',
            // Removed validation for optional fields
        ]);

        $patient = User::findOrFail($request->patient_id);
        $doctor = User::findOrFail($request->doctor_id);
        $nurse = User::findOrFail($request->nurse_id);

        $medicalVisit = new MedicalVisit();
        $medicalVisit->patient_id = $request->patient_id;
        $medicalVisit->unique_id = $patient->unique_id; // Ensure unique_id is set
        $medicalVisit->visit_date = $request->visit_date;
        $medicalVisit->doctor_name = $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name;
        $medicalVisit->nurse_name = $nurse->first_name . ' ' . $nurse->middle_name . ' ' . $nurse->last_name;
        $medicalVisit->save();

        return redirect()->route('medical_visit.index')->with('success', 'Medical visit created successfully.');
    }

    // Show the details of a specific medical visit
    public function show($id)
    {
        $visit = MedicalVisit::with('patient')->findOrFail($id); // Removed 'doctor' and 'nurse'
        return view('medical_visit.show', compact('visit'));
    }

    // Show the form for editing a specific medical visit
    public function edit($id)
    {
        $visit = MedicalVisit::findOrFail($id);
        $patients = User::where('usertype', 'patient')->get();
        return view('medical_visit.edit', compact('visit', 'patients'));
    }

    // Update a specific medical visit
    public function update(Request $request, $id)
    {
        $request->validate([
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

        $visit = MedicalVisit::findOrFail($id);
        $visit->update($request->all());

        return redirect()->route('medical_visit.show', $visit->id)->with('success', 'Medical visit updated successfully.');
    }
}
