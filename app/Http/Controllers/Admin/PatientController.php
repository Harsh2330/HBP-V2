<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('admin.patient.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'age_category' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|string|email|max:255|unique:patients',
            'full_address' => 'required|string',
            'religion' => 'required|string',
            'economic_status' => 'required|string',
            'bpl_card_number' => 'nullable|string|max:255',
            'ayushman_card' => 'required|boolean',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:15',
            'emergency_contact_relationship' => 'required|string',
        ]);

        $data = $request->all();
        $data['full_name'] = trim("{$request->first_name} {$request->middle_name} {$request->last_name}");

        Patient::create($data);

        return redirect()->route('admin.patient.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('admin.patient.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'age_category' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|string|email|max:255|unique:patients,email,' . $patient->id,
            'full_address' => 'required|string',
            'religion' => 'required|string',
            'economic_status' => 'required|string',
            'bpl_card_number' => 'nullable|string|max:255',
            'ayushman_card' => 'required|boolean',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:15',
            'emergency_contact_relationship' => 'required|string',
        ]);

        $data = $request->all();
        $data['full_name'] = trim("{$request->first_name} {$request->middle_name} {$request->last_name}");

        $patient->update($data);

        return redirect()->route('admin.patient.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('admin.patient.index')->with('success', 'Patient deleted successfully.');
    }
}