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
        $medicalVisits = MedicalVisit::with(['patient', 'doctor', 'nurse'])->paginate(10);
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
            'unique_id' => 'required|exists:users,unique_id',
            'visit_date' => 'required|date',
            'doctor_name' => 'required|string',
            'nurse_name' => 'required|string',
            'diagnosis' => 'required|string',
            'simplified_diagnosis' => 'required|string',
            'blood_pressure' => 'required|string',
            'heart_rate' => 'required|string',
            'temperature' => 'required|string',
            'weight' => 'required|string',
            'ongoing_treatments' => 'required|string',
            'medications_prescribed' => 'required|string',
            'procedures' => 'required|string',
            'doctor_notes' => 'nullable|string',
            'nurse_observations' => 'nullable|string',
        ]);

        $medicalVisit = new MedicalVisit;
        $medicalVisit->unique_id = $request->unique_id;
        $medicalVisit->visit_date = $request->visit_date;
        $medicalVisit->doctor_name = $request->doctor_name;
        $medicalVisit->nurse_name = $request->nurse_name;
        $medicalVisit->diagnosis = $request->diagnosis;
        $medicalVisit->simplified_diagnosis = $request->simplified_diagnosis;
        $medicalVisit->blood_pressure = $request->blood_pressure;
        $medicalVisit->heart_rate = $request->heart_rate;
        $medicalVisit->temperature = $request->temperature;
        $medicalVisit->weight = $request->weight;
        $medicalVisit->ongoing_treatments = $request->ongoing_treatments;
        $medicalVisit->medications_prescribed = $request->medications_prescribed;
        $medicalVisit->procedures = $request->procedures;
        $medicalVisit->doctor_notes = $request->doctor_notes;
        $medicalVisit->nurse_observations = $request->nurse_observations;
        $medicalVisit->save();

        return redirect()->route('medical_visit.index')->with('status', 'Medical visit created successfully!');
    }

    // Show the details of a specific medical visit
    public function show($id)
    {
        $visit = MedicalVisit::with(['patient'])->findOrFail($id);
        return view('medical_visit.show', compact('visit'));
    }
}
