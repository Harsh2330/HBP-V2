<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    // Display a list of medical histories
    public function index(Request $request)
    {
        $query = MedicalHistory::query();

        if ($request->has('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $medicalHistories = $query->paginate(5); // Retrieve 5 medical histories per page
        return view('medical_history.index', compact('medicalHistories'));
    }

    // Show the form for creating a new medical history
    public function create()
    {
        $patients = User::where('usertype', 'patient')->get();
        return view('medical_history.create', compact('patients'));
    }

    // Store a newly created medical history
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'details' => 'required|string',
        ]);

        $medicalHistory = new MedicalHistory;
        $medicalHistory->user_id = $request->user_id;
        $medicalHistory->details = $request->details;
        $medicalHistory->save();

        return redirect()->route('medical_history.index')->with('status', 'Medical history created successfully!');
    }
}
