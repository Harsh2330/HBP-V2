<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController; // Add this import
use App\Models\User;
use App\Models\Patient; // Change to Patient model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this import
use Illuminate\Support\Facades\Log; // Add this import

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('usertype', 'user');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('middle_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('unique_id', 'like', "%{$search}%");
            });
        }

        $patients = $query->paginate(10);

        return view('admin.patient.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::find($id); // Fetch patient details from users table
        if (!$patient) {
            return redirect()->route('admin.patient.index')->with('error', 'Patient not found.');
        }
        return view('admin.patient.show', compact('patient'));
    }

    public function approve(User $user)
    {
        $user->is_approved = true;
        $user->usertype = 'patient';

        // Generate unique ID
        $year = date('Y');
        $lastUser = User::where('unique_id', 'like', "PAT-$year-%")->orderBy('unique_id', 'desc')->first();
        $lastNumber = $lastUser ? intval(substr($lastUser->unique_id, -4)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        $user->unique_id = "PAT-$year-$newNumber";

        $user->save();

        return redirect()->route('admin.patient.index')->with('success', 'Patient approved successfully.');
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
            'email' => 'nullable|string|email|max:255|unique:users|unique:patients', // Validate for both tables
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

        DB::transaction(function () use ($data, $request) {
            try {
                // Use UserController to create user
                $userController = new UserController();
                $userRequest = new Request($request->only([
                    'first_name', 'middle_name', 'last_name', 'date_of_birth', 'phone_number', 'email', 'password'
                ]));
                $userRequest->merge(['usertype' => 'patient']);
                $userController->store($userRequest);

                // Create patient
                $user = User::where('email', $data['email'])->first();
                if (!$user) {
                    throw new \Exception('User creation failed.');
                }
                $data['user_id'] = $user->id;
                Patient::create($data);
            } catch (\Exception $e) {
                Log::error('Error creating patient: ' . $e->getMessage());
                throw $e;
            }
        });

        return redirect()->route('admin.patient.index')->with('success', 'Patient created successfully.');
    }
}